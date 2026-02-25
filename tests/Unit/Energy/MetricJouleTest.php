<?php

declare(strict_types=1);

use Mesura\Energy\MetricJoule;

// Ensure all generated classes are loaded
$energyDir = dirname(__DIR__, 3) . '/src/Energy';
foreach (glob($energyDir . '/*.php') ?: [] as $file) {
    require_once $file;
}

$metricJouleClasses = array_filter(
    get_declared_classes(),
    fn (string $class) => is_subclass_of($class, MetricJoule::class) && !(new ReflectionClass($class))->isAbstract(),
);

dataset('metric joule units', function () use ($metricJouleClasses) {
    foreach ($metricJouleClasses as $class) {
        yield $class => [$class];
    }
});

test('metric joule has correct symbol suffix', function (string $class) {
    $instance = new $class(1.0);
    $symbol   = $instance->getInstanceSymbol();
    expect(str_ends_with($symbol, 'J'))->toBeTrue("Symbol '{$symbol}' should end with 'J'");
})->with('metric joule units');

test('metric joule round-trips through joule value', function (string $class) {
    $original     = new $class(42.0);
    $roundTripped = $class::fromJouleValue($original->toJouleValue());
    expect($roundTripped->getValue())->toEqualWithDelta(42.0, 1e-6);
})->with('metric joule units');

test('metric joule conversion factor matches expected power of 10', function (string $class) {
    $prefix = (new ReflectionMethod($class, 'prefix'))->invoke(null);
    \assert($prefix instanceof Mesura\MetricPrefix);
    // 1 prefix-joule = 10^prefix joules
    $expectedJoules = 10 ** $prefix->value;

    $instance   = new $class(1.0);
    $jouleValue = $instance->toJouleValue();

    expect($jouleValue)->toEqualWithDelta($expectedJoules, abs($expectedJoules) * 1e-10);
})->with('metric joule units');
