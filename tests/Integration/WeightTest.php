<?php

declare(strict_types=1);

use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\MetricTon;
use MeasurementUnit\Weight\Pound;

dataset('weight units', function () {
    yield Kilogram::class  => [new Kilogram(42.0)];
    yield MetricTon::class => [new MetricTon(42.0)];
    yield Pound::class     => [new Pound(42.0)];
});

test('round-trips through kilogram value', function ($weight) {
    expect($weight::fromKilogramValue($weight->toKilogramValue()))
        ->toEqualWithDelta($weight, 0.000001);
})->with('weight units');

test('converts at correct rate', function () {
    expect((new Kilogram(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(42.0), 0.000001);
    expect((new MetricTon(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(42000.0), 0.000001);
    expect((new Pound(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(19.050864), 0.000001);
});
