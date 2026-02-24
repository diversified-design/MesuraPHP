<?php

declare(strict_types=1);

use MeasurementUnit\Length\MetricLength;

$metricLengthClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricLength::class) && !(new ReflectionClass($class))->isAbstract(),
);

// Ensure all generated classes are loaded
$lengthDir = dirname(__DIR__, 3) . '/src/Length';
foreach (glob($lengthDir . '/*.php') as $file) {
    require_once $file;
}

$metricLengthClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricLength::class) && !(new ReflectionClass($class))->isAbstract(),
);

dataset('metric length units', function () use ($metricLengthClasses) {
    foreach ($metricLengthClasses as $class) {
        yield $class => [$class];
    }
});

test('metric length has correct symbol prefix', function (string $class) {
    $instance = new $class(1.0);
    $symbol   = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'm'))->toBeTrue("Symbol '{$symbol}' should end with 'm'");
})->with('metric length units');

test('metric length round-trips through meter value', function (string $class) {
    $original     = new $class(42.0);
    $roundTripped = $class::fromMeterValue($original->toMeterValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric length units');

test('metric length conversion factor matches expected power of 10', function (string $class) {
    $prefix         = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    $expectedFactor = 10 ** $prefix->value;

    $instance   = new $class(1.0);
    $meterValue = $instance->toMeterValue();

    expect($meterValue)->toEqualWithDelta($expectedFactor, abs($expectedFactor) * 1e-10);
})->with('metric length units');
