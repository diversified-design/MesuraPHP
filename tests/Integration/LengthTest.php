<?php

declare(strict_types=1);

use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Furlong;
use MeasurementUnit\Length\HorseLength;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Millimeter;
use MeasurementUnit\Length\NauticalMile;
use MeasurementUnit\Length\StatuteMile;
use MeasurementUnit\Length\SurveyMile;
use MeasurementUnit\Length\Thou;
use MeasurementUnit\Length\Yard;

dataset('length units', function () {
    yield Centimeter::class => [new Centimeter(42.0)];
    yield Fathom::class => [new Fathom(42.0)];
    yield Foot::class => [new Foot(42.0)];
    yield Furlong::class => [new Furlong(42.0)];
    yield HorseLength::class => [new HorseLength(42.0)];
    yield Inch::class => [new Inch(42.0)];
    yield Kilometer::class => [new Kilometer(42.0)];
    yield Meter::class => [new Meter(42.0)];
    yield Millimeter::class => [new Millimeter(42.0)];
    yield StatuteMile::class => [new StatuteMile(42.0)];
    yield NauticalMile::class => [new NauticalMile(42.0)];
    yield SurveyMile::class => [new SurveyMile(42.0)];
    yield Thou::class => [new Thou(42.0)];
    yield Yard::class => [new Yard(42.0)];
});

test('round-trips through meter value', function ($length) {
    expect($length::fromMeterValue($length->toMeterValue()))
        ->toEqualWithDelta($length, 0.000001)
    ;
})->with('length units');

test('withValue preserves concrete unit type in conversion chain', function () {
    $result = (new Meter(5.0))
        ->toCentimeter()
        ->withValue(fn (float $v) => $v / 2)
        ->toInch();

    expect($result)->toBeInstanceOf(Inch::class);
    expect($result)->toEqualWithDelta(new Inch(98.4252), 0.001);
});

test('converts at correct rate', function () {
    expect((new Centimeter(42.0))->toMeter())->toEqualWithDelta(new Meter(0.42), 0.000001);
    expect((new Fathom(42.0))->toMeter())->toEqualWithDelta(new Meter(76.8096), 0.000001);
    expect((new Foot(42.0))->toMeter())->toEqualWithDelta(new Meter(12.8016), 0.000001);
    expect((new Furlong(42.0))->toMeter())->toEqualWithDelta(new Meter(8449.056), 0.000001);
    expect((new HorseLength(42.0))->toMeter())->toEqualWithDelta(new Meter(100.8), 0.000001);
    expect((new Inch(42.0))->toMeter())->toEqualWithDelta(new Meter(1.0668), 0.000001);
    expect((new Kilometer(42.0))->toMeter())->toEqualWithDelta(new Meter(42000.0), 0.000001);
    expect((new Millimeter(42.0))->toMeter())->toEqualWithDelta(new Meter(0.042), 0.000001);
    expect((new Meter(42.0))->toMeter())->toEqualWithDelta(new Meter(42.0), 0.000001);
    expect((new StatuteMile(42.0))->toMeter())->toEqualWithDelta(new Meter(67592.448), 0.000001);
    expect((new NauticalMile(42.0))->toMeter())->toEqualWithDelta(new Meter(77784), 0.000001);
    expect((new SurveyMile(42.0))->toMeter())->toEqualWithDelta(new Meter(67592.5824), 0.000001);
    expect((new Thou(42.0))->toMeter())->toEqualWithDelta(new Meter(0.0010668), 0.000001);
    expect((new Yard(42.0))->toMeter())->toEqualWithDelta(new Meter(38.4048), 0.000001);
});
