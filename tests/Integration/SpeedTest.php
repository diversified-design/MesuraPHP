<?php

declare(strict_types=1);

use MeasurementUnit\Speed\KilometerPerHour;
use MeasurementUnit\Speed\Knot;
use MeasurementUnit\Speed\MeterPerSecond;
use MeasurementUnit\Speed\MilesPerHour;

dataset('speed units', function () {
    yield KilometerPerHour::class => [new KilometerPerHour(42.0)];
    yield Knot::class             => [new Knot(42.0)];
    yield MeterPerSecond::class   => [new MeterPerSecond(42.0)];
    yield MilesPerHour::class     => [new MilesPerHour(42.0)];
});

test('round-trips through meter per second value', function ($speed) {
    expect($speed::fromMeterPerSecondValue($speed->toMeterPerSecondValue()))
        ->toEqualWithDelta($speed, 0.000001);
})->with('speed units');

test('converts at correct rate', function () {
    expect((new KilometerPerHour(42.0))->toMeterPerSecond())->toEqualWithDelta(new MeterPerSecond(11.666676), 0.000001);
    expect((new Knot(42.0))->toMeterPerSecond())->toEqualWithDelta(new MeterPerSecond(21.606648), 0.000001);
    expect((new MeterPerSecond(42.0))->toMeterPerSecond())->toEqualWithDelta(new MeterPerSecond(42.0), 0.000001);
    expect((new MilesPerHour(42.0))->toMeterPerSecond())->toEqualWithDelta(new MeterPerSecond(18.77568), 0.000001);
});
