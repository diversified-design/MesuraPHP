<?php

declare(strict_types=1);

use MeasurementUnit\Weight\MetricWeight;

// Ensure all generated classes are loaded
$weightDir = dirname(__DIR__, 3) . '/src/Weight';
foreach (glob($weightDir . '/*.php') as $file) {
    require_once $file;
}

$metricWeightClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricWeight::class) && ! (new ReflectionClass($class))->isAbstract(),
);

dataset('metric weight units', function () use ($metricWeightClasses) {
    foreach ($metricWeightClasses as $class) {
        yield $class => [$class];
    }
});

test('metric weight has correct symbol suffix', function (string $class) {
    $instance = new $class(1.0);
    $symbol = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'g'))->toBeTrue("Symbol '{$symbol}' should end with 'g'");
})->with('metric weight units');

test('metric weight round-trips through kilogram value', function (string $class) {
    $original = new $class(42.0);
    $roundTripped = $class::fromKilogramValue($original->toKilogramValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric weight units');

test('metric weight conversion factor matches expected power of 10', function (string $class) {
    $prefix = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    // prefix-gram = 10^(prefix - 3) kg, so 1 prefix-gram = 10^(prefix-3) kg
    $expectedKg = 10 ** ($prefix->value - 3);

    $instance = new $class(1.0);
    $kgValue = $instance->toKilogramValue();

    expect($kgValue)->toEqualWithDelta($expectedKg, abs($expectedKg) * 1e-10);
})->with('metric weight units');
