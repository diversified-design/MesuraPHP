<?php

declare(strict_types=1);

use Mesura\Area\MetricArea;

// Ensure all generated classes are loaded
$areaDir = dirname(__DIR__, 3) . '/src/Area';
foreach (glob($areaDir . '/*.php') ?: [] as $file) {
    require_once $file;
}

$metricAreaClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricArea::class) && !(new ReflectionClass($class))->isAbstract(),
);

dataset('metric area units', function () use ($metricAreaClasses) {
    foreach ($metricAreaClasses as $class) {
        yield $class => [$class];
    }
});

test('metric area has correct symbol suffix', function (string $class) {
    $instance = new $class(1.0);
    $symbol   = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'm²'))->toBeTrue("Symbol '{$symbol}' should end with 'm²'");
})->with('metric area units');

test('metric area round-trips through square meter value', function (string $class) {
    $original     = new $class(42.0);
    $roundTripped = $class::fromSquareMeterValue($original->toSquareMeterValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric area units');

test('metric area conversion factor matches expected power of 10', function (string $class) {
    $prefix = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    \assert($prefix instanceof Mesura\MetricPrefix);
    // square prefix-meter = 10^(prefix × 2) m²
    $expectedM2 = 10 ** ($prefix->value * 2);

    $instance = new $class(1.0);
    $m2Value  = $instance->toSquareMeterValue();

    expect($m2Value)->toEqualWithDelta($expectedM2, abs($expectedM2) * 1e-10);
})->with('metric area units');
