<?php

declare(strict_types=1);

use MeasurementUnit\Volume\Centiliter;
use MeasurementUnit\Volume\CubicInch;
use MeasurementUnit\Volume\CubicMeter;
use MeasurementUnit\Volume\CubicYard;
use MeasurementUnit\Volume\Decaliter;
use MeasurementUnit\Volume\Deciliter;
use MeasurementUnit\Volume\FluidDram;
use MeasurementUnit\Volume\FluidOunce;
use MeasurementUnit\Volume\Hectoliter;
use MeasurementUnit\Volume\Kiloliter;
use MeasurementUnit\Volume\Liter;
use MeasurementUnit\Volume\Milliliter;
use MeasurementUnit\Volume\Pint;
use MeasurementUnit\Volume\Quart;
use MeasurementUnit\Volume\TableSpoon;

dataset('volume units', function () {
    yield Milliliter::class => [new Milliliter(42.0)];
    yield Centiliter::class => [new Centiliter(42.0)];
    yield Deciliter::class => [new Deciliter(42.0)];
    yield Decaliter::class => [new Decaliter(42.0)];
    yield Hectoliter::class => [new Hectoliter(42.0)];
    yield Kiloliter::class => [new Kiloliter(42.0)];
    yield CubicInch::class => [new CubicInch(42.0)];
    yield CubicMeter::class => [new CubicMeter(42.0)];
    yield CubicYard::class => [new CubicYard(42.0)];
    yield FluidDram::class => [new FluidDram(42.0)];
    yield FluidOunce::class => [new FluidOunce(42.0)];
    yield Liter::class => [new Liter(42.0)];
    yield Pint::class => [new Pint(42.0)];
    yield Quart::class => [new Quart(42.0)];
    yield TableSpoon::class => [new TableSpoon(42.0)];
});

test('round-trips through cubic meter value', function ($volume) {
    expect($volume::fromCubicMeterValue($volume->toCubicMeterValue()))
        ->toEqualWithDelta($volume, 0.000001)
    ;
})->with('volume units');

test('converts at correct rate', function () {
    expect((new CubicInch(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.0006882582), 0.000001);
    expect((new CubicMeter(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(42.0), 0.000001);
    expect((new CubicYard(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(32.1113099), 0.000001);
    expect((new FluidDram(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.000155261), 0.000001);
    expect((new FluidOunce(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.00124209), 0.000001);
    expect((new Liter(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.042), 0.000001);
    expect((new Pint(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.019873392), 0.000001);
    expect((new Quart(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.0397468), 0.000001);
    expect((new TableSpoon(42.0))->toCubicMeter())->toEqualWithDelta(new CubicMeter(0.000621044), 0.000001);
});
