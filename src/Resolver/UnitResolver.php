<?php

declare(strict_types=1);

namespace Mesura\Resolver;

use LogicException;
use Mesura\InvalidUnitException;
use Mesura\MeasurementUnit;
use Mesura\MetricPrefix;

final class UnitResolver
{
    /** @var array<string, array<string, class-string<MeasurementUnit>>> */
    private static array $cache = [];

    /**
     * Resolve a unit string to its fully-qualified class name within a domain.
     *
     * @param array<class-string<MeasurementUnit>, list<string>>                                                     $aliases
     * @param array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string}|null $metricConfig
     *
     * @return class-string<MeasurementUnit>
     */
    public static function resolveClass(
        string $domainKey,
        array $aliases,
        ?array $metricConfig,
        string $input,
    ): string {
        $map        = self::getCache($domainKey, $aliases, $metricConfig);
        $normalized = mb_strtolower(trim($input));

        if ($normalized === '') {
            throw new InvalidUnitException('Unit identifier cannot be empty.');
        }

        if (isset($map[$normalized])) {
            return $map[$normalized];
        }

        throw new InvalidUnitException(sprintf("Cannot resolve '%s' to a known unit in the %s domain.", $input, $domainKey));
    }

    /**
     * Resolve a unit string and hydrate it with the given value.
     *
     * @param array<class-string<MeasurementUnit>, list<string>>                                                     $aliases
     * @param array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string}|null $metricConfig
     */
    public static function resolve(
        string $domainKey,
        array $aliases,
        ?array $metricConfig,
        string $input,
        float $value,
    ): MeasurementUnit {
        /** @var class-string<MeasurementUnit> $class */
        $class = self::resolveClass($domainKey, $aliases, $metricConfig, $input);

        return new $class($value);
    }

    /**
     * @param array<class-string<MeasurementUnit>, list<string>>                                                     $aliases
     * @param array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string}|null $metricConfig
     *
     * @return array<string, class-string<MeasurementUnit>>
     */
    private static function getCache(string $domainKey, array $aliases, ?array $metricConfig): array
    {
        if (isset(self::$cache[$domainKey])) {
            return self::$cache[$domainKey];
        }

        return self::$cache[$domainKey] = self::buildMap($aliases, $metricConfig);
    }

    /**
     * Build the normalised alias-to-class map.
     *
     * Priority order:
     *   1. Auto-seeded $defaultSymbol (first-come wins on collision)
     *   2. Explicit aliases (override auto-seeded; throw on mutual collision)
     *   3. Metric prefix compositions (skip on collision)
     *
     * @param array<class-string<MeasurementUnit>, list<string>>                                                     $aliases
     * @param array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string}|null $metricConfig
     *
     * @return array<string, class-string<MeasurementUnit>>
     */
    private static function buildMap(array $aliases, ?array $metricConfig): array
    {
        $map = [];

        // Phase 1: Auto-seed with each class's canonical $defaultSymbol
        foreach ($aliases as $class => $_) {
            $symbol = mb_strtolower($class::getDefaultSymbol());

            if ($symbol !== '' && !isset($map[$symbol])) {
                $map[$symbol] = $class;
            }
        }

        // Phase 2: Apply explicit aliases (override auto-seeded, detect mutual collisions)
        $explicitlyAssigned = [];

        foreach ($aliases as $class => $names) {
            foreach ($names as $name) {
                $key = mb_strtolower($name);

                if (isset($explicitlyAssigned[$key]) && $explicitlyAssigned[$key] !== $class) {
                    throw new LogicException(sprintf("Unit alias '%s' is claimed by both %s and %s.", $name, $explicitlyAssigned[$key], $class));
                }

                $explicitlyAssigned[$key] = $class;
                $map[$key]                = $class;
            }
        }

        // Phase 3: Compose metric prefix aliases (skip if key exists)
        if ($metricConfig !== null) {
            self::buildMetricAliases($map, $metricConfig);
        }

        return $map;
    }

    /**
     * Generate aliases for all metric-prefixed units in a domain.
     *
     * @param array<string, class-string<MeasurementUnit>>                                                      $map
     * @param array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string} $config
     */
    private static function buildMetricAliases(array &$map, array $config): void
    {
        foreach (MetricPrefix::cases() as $prefix) {
            $className = $config['namespace'] . sprintf($config['classPattern'], ucfirst($prefix->prefixName()));

            if (!class_exists($className)) {
                continue;
            }

            // Auto-seed the metric class's $defaultSymbol
            /** @var class-string<MeasurementUnit> $className */
            $defaultSymbol = mb_strtolower($className::getDefaultSymbol());

            if ($defaultSymbol !== '' && !isset($map[$defaultSymbol])) {
                $map[$defaultSymbol] = $className;
            }

            // Name-based aliases (e.g. 'kilometer', 'kilometre')
            foreach ($config['namePatterns'] as $pattern) {
                $alias = mb_strtolower(sprintf($pattern, $prefix->prefixName()));

                if (!isset($map[$alias])) {
                    $map[$alias] = $className;
                }
            }

            // Symbol-based alias (e.g. 'km')
            $symbolAlias = mb_strtolower(sprintf($config['symbolPattern'], $prefix->symbol()));

            if (!isset($map[$symbolAlias])) {
                $map[$symbolAlias] = $className;
            }
        }
    }

    /**
     * Clear the resolver cache. Primarily for testing.
     */
    public static function clearCache(): void
    {
        self::$cache = [];
    }
}
