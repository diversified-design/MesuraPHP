<?php

declare(strict_types=1);

namespace Mesura;

use Mesura\Resolver\UnitResolver;

/** @phpstan-consistent-constructor */
abstract class MeasurementUnit implements MeasurementUnitInterface
{
    protected static string $defaultSymbol = 'unit';

    /** @var array<class-string, string> */
    private static array $symbolOverrides = [];

    protected string $symbol;

    public function __construct(
        public readonly float $value,
        ?string $symbol = null,
    ) {
        $this->symbol = $symbol ?? self::$symbolOverrides[static::class] ?? static::$defaultSymbol;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getInstanceSymbol(): string
    {
        return $this->symbol;
    }

    public function setInstanceSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public static function getSymbol(): string
    {
        return self::$symbolOverrides[static::class] ?? static::$defaultSymbol;
    }

    public static function setSymbol(string $symbol): void
    {
        self::$symbolOverrides[static::class] = $symbol;
    }

    public static function resetSymbol(): void
    {
        unset(self::$symbolOverrides[static::class]);
    }

    public static function resetAllSymbols(): void
    {
        self::$symbolOverrides = [];
    }

    /**
     * @param callable(float): (float|int) $callback
     */
    public function withValue(callable $callback): static
    {
        return new static((float) $callback($this->value), $this->symbol);
    }

    // Formatting Methods
    public function toHtml(string $sprintfTemplate = '<span class="value">%1$.1f</span> <span class="symbol">%2$s</span>'): string
    {
        return $this->toFormat(sprintfTemplate: $sprintfTemplate);
    }

    public function toFormat(string $sprintfTemplate = '%.1f %s'): string
    {
        $value  = $this->getValue();
        $symbol = $this->getInstanceSymbol();

        return vsprintf($sprintfTemplate, [$value, $symbol]);
    }

    // Magic Methods
    public function __toString(): string
    {
        return $this->getValue() . ' ' . $this->getInstanceSymbol();
    }

    // Resolution Methods

    public static function getDefaultSymbol(): string
    {
        return static::$defaultSymbol;
    }

    /**
     * Return the alias map for this domain's non-metric units.
     *
     * Keys are concrete unit class-strings; values are lists of lowercase alias strings
     * (beyond the auto-seeded $defaultSymbol).
     *
     * @return array<class-string<MeasurementUnit>, list<string>>
     */
    abstract protected static function unitAliases(): array;

    /**
     * Return metric prefix composition config, or null for non-metric domains.
     *
     * @return array{namePatterns: list<string>, symbolPattern: string, namespace: string, classPattern: string}|null
     */
    protected static function metricConfig(): ?array
    {
        return null;
    }

    /**
     * Resolve a unit identifier string to its fully-qualified class name.
     *
     * @return class-string<static>
     */
    public static function resolveUnitClass(string $input): string
    {
        /** @var class-string<static> */
        return UnitResolver::resolveClass(
            static::class,
            static::unitAliases(),
            static::metricConfig(),
            $input,
        );
    }

    /**
     * Resolve a unit identifier string and return a hydrated instance.
     */
    public static function resolve(string $input, float $value): static
    {
        /** @var static */
        return UnitResolver::resolve(
            static::class,
            static::unitAliases(),
            static::metricConfig(),
            $input,
            $value,
        );
    }

    // Abstract Methods
    abstract public static function unitSystem(): UnitSystem;
}
