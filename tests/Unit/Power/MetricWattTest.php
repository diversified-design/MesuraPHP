<?php

declare(strict_types=1);

use Mesura\Power\MetricWatt;

// Ensure all generated classes are loaded
$powerDir = dirname(__DIR__, 3) . '/src/Power';
foreach (glob($powerDir . '/*.php') ?: [] as $file) {
    require_once $file;
}

$metricWattClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricWatt::class) && !(new ReflectionClass($class))->isAbstract(),
);

dataset('metric watt units', function () use ($metricWattClasses) {
    foreach ($metricWattClasses as $class) {
        yield $class => [$class];
    }
});

test('metric watt has correct symbol suffix', function (string $class) {
    $instance = new $class(1.0);
    $symbol   = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'W'))->toBeTrue("Symbol '{$symbol}' should end with 'W'");
})->with('metric watt units');

test('metric watt round-trips through watt value', function (string $class) {
    $original     = new $class(42.0);
    $roundTripped = $class::fromWattValue($original->toWattValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric watt units');

test('metric watt conversion factor matches expected power of 10', function (string $class) {
    $prefix = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    \assert($prefix instanceof Mesura\MetricPrefix);
    // 1 prefix-watt = 10^prefix watts
    $expectedWatts = 10 ** $prefix->value;

    $instance  = new $class(1.0);
    $wattValue = $instance->toWattValue();

    expect($wattValue)->toEqualWithDelta($expectedWatts, abs($expectedWatts) * 1e-10);
})->with('metric watt units');
