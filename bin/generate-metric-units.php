#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Generates concrete metric-prefixed unit classes and their tests.
 *
 * Usage: php bin/generate-metric-units.php
 */
$projectRoot = dirname(__DIR__);

// All 24 SI metric prefixes: name => [exponent, symbol]
$prefixes = [
    'Quetta' => [30, 'Q'],
    'Ronna'  => [27, 'R'],
    'Yotta'  => [24, 'Y'],
    'Zetta'  => [21, 'Z'],
    'Exa'    => [18, 'E'],
    'Peta'   => [15, 'P'],
    'Tera'   => [12, 'T'],
    'Giga'   => [9, 'G'],
    'Mega'   => [6, 'M'],
    'Kilo'   => [3, 'k'],
    'Hecto'  => [2, 'h'],
    'Deca'   => [1, 'da'],
    'Deci'   => [-1, 'd'],
    'Centi'  => [-2, 'c'],
    'Milli'  => [-3, 'm'],
    'Micro'  => [-6, 'μ'],
    'Nano'   => [-9, 'n'],
    'Pico'   => [-12, 'p'],
    'Femto'  => [-15, 'f'],
    'Atto'   => [-18, 'a'],
    'Zepto'  => [-21, 'z'],
    'Yocto'  => [-24, 'y'],
    'Ronto'  => [-27, 'r'],
    'Quecto' => [-30, 'q'],
];

$dimensions = [
    'Length' => [
        'namespace'    => 'MeasurementUnit\Length',
        'abstract'     => 'MetricLength',
        'classPattern' => '{Prefix}meter',
        'symbolUnit'   => 'm',
        'skip'         => [], // Meter is the base, not a prefixed unit
    ],
    'Weight' => [
        'namespace'    => 'MeasurementUnit\Weight',
        'abstract'     => 'MetricWeight',
        'classPattern' => '{Prefix}gram',
        'symbolUnit'   => 'g',
        'skip'         => [], // Kilogram is refactored separately
    ],
    'Volume' => [
        'namespace'    => 'MeasurementUnit\Volume',
        'abstract'     => 'MetricLiter',
        'classPattern' => '{Prefix}liter',
        'symbolUnit'   => 'l',
        'skip'         => [], // Liter is the reference, not prefixed
    ],
    'Area' => [
        'namespace'    => 'MeasurementUnit\Area',
        'abstract'     => 'MetricArea',
        'classPattern' => 'Square{Prefix}meter',
        'symbolUnit'   => 'm²',
        'skip'         => [], // SquareMeter is the base, not prefixed
    ],
];

// Classes that already exist and will be refactored manually — don't overwrite
$existingClasses = [
    'Kilometer', 'Centimeter', 'Millimeter',  // Length
    'Kilogram',                                 // Weight
    'SquareKilometer',                          // Area
];

$created = 0;
$skipped = 0;

foreach ($dimensions as $dimName => $config) {
    $srcDir  = $projectRoot . '/src/' . $dimName;
    $testDir = $projectRoot . '/tests/Unit/' . $dimName;

    if (!is_dir($testDir)) {
        mkdir($testDir, 0755, true);
    }

    foreach ($prefixes as $prefixName => [$exponent, $prefixSymbol]) {
        $className = str_replace('{Prefix}', $prefixName, $config['classPattern']);
        $symbol    = $prefixSymbol . $config['symbolUnit'];

        // Skip classes that already exist and will be refactored manually
        if (in_array($className, $existingClasses, true)) {
            echo "  SKIP (existing) {$config['namespace']}\\{$className}\n";
            $skipped++;

            continue;
        }

        // Skip classes in the skip list
        if (in_array($className, $config['skip'], true)) {
            echo "  SKIP (configured) {$config['namespace']}\\{$className}\n";
            $skipped++;

            continue;
        }

        // Generate the class file
        $classFile    = $srcDir . '/' . $className . '.php';
        $classContent = generateClassFile(
            $config['namespace'],
            $config['abstract'],
            $className,
            $prefixName,
            $symbol,
        );
        file_put_contents($classFile, $classContent);
        echo "  CREATE {$config['namespace']}\\{$className}\n";
        $created++;
    }
}

echo "\nDone. Created: {$created}, Skipped: {$skipped}\n";

// --- Generator functions ---

function generateClassFile(
    string $namespace,
    string $abstract,
    string $className,
    string $prefixName,
    string $symbol,
): string {
    return <<<PHP
<?php

declare(strict_types=1);

namespace {$namespace};

use MeasurementUnit\\MetricPrefix;

class {$className} extends {$abstract}
{
    protected static string \$defaultSymbol = '{$symbol}';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::{$prefixName};
    }
}

PHP;
}
