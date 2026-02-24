<?php

declare(strict_types=1);

use MeasurementUnit\Volume\MetricLiter;

// Ensure all generated classes are loaded
$volumeDir = dirname(__DIR__, 3) . '/src/Volume';
foreach (glob($volumeDir . '/*.php') as $file) {
    require_once $file;
}

$metricLiterClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricLiter::class) && !(new ReflectionClass($class))->isAbstract(),
);

dataset('metric liter units', function () use ($metricLiterClasses) {
    foreach ($metricLiterClasses as $class) {
        yield $class => [$class];
    }
});

test('metric liter has correct symbol suffix', function (string $class) {
    $instance = new $class(1.0);
    $symbol   = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'l'))->toBeTrue("Symbol '{$symbol}' should end with 'l'");
})->with('metric liter units');

test('metric liter round-trips through cubic meter value', function (string $class) {
    $original     = new $class(42.0);
    $roundTripped = $class::fromCubicMeterValue($original->toCubicMeterValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric liter units');

test('metric liter conversion factor matches expected power of 10', function (string $class) {
    $prefix = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    // prefix-liter = 10^(prefix - 3) m³, so 1 prefix-liter = 10^(prefix-3) m³
    $expectedM3 = 10 ** ($prefix->value - 3);

    $instance = new $class(1.0);
    $m3Value  = $instance->toCubicMeterValue();

    expect($m3Value)->toEqualWithDelta($expectedM3, abs($expectedM3) * 1e-10);
})->with('metric liter units');
