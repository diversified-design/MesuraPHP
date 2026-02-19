<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Bar;
use MeasurementUnit\Pressure\Hectopascal;
use MeasurementUnit\Pressure\Kilopascal;
use MeasurementUnit\Pressure\Millibar;
use MeasurementUnit\Pressure\MillimetreOfMercury;
use MeasurementUnit\Pressure\Pascal;
use MeasurementUnit\Pressure\PoundPerSquareInch;
use MeasurementUnit\Pressure\StandardAtmosphere;
use MeasurementUnit\Pressure\Torr;

dataset('pressure units', function () {
    yield Pascal::class              => [new Pascal(42.0)];
    yield Bar::class                 => [new Bar(42.0)];
    yield Hectopascal::class         => [new Hectopascal(42.0)];
    yield Kilopascal::class          => [new Kilopascal(42.0)];
    yield Millibar::class            => [new Millibar(42.0)];
    yield MillimetreOfMercury::class => [new MillimetreOfMercury(42.0)];
    yield PoundPerSquareInch::class  => [new PoundPerSquareInch(42.0)];
    yield StandardAtmosphere::class  => [new StandardAtmosphere(42.0)];
    yield Torr::class                => [new Torr(42.0)];
});

test('round-trips through pascal value', function ($pressure) {
    expect($pressure::fromPascalValue($pressure->toPascalValue()))
        ->toEqualWithDelta($pressure, 0.000001);
})->with('pressure units');

test('converts at correct rate', function () {
    expect((new Pascal(42.0))->toPascal())->toEqualWithDelta(new Pascal(42.0), 0.000001);
    expect((new Bar(42.0))->toPascal())->toEqualWithDelta(new Pascal(4200000.0), 0.000001);
    expect((new Hectopascal(42.0))->toPascal())->toEqualWithDelta(new Pascal(4200.0), 0.000001);
    expect((new Kilopascal(42.0))->toPascal())->toEqualWithDelta(new Pascal(42000.0), 0.000001);
    expect((new Millibar(42.0))->toPascal())->toEqualWithDelta(new Pascal(4200.0), 0.000001);
    expect((new MillimetreOfMercury(42.0))->toPascal())->toEqualWithDelta(new Pascal(5599.540271430001), 0.000001);
    expect((new PoundPerSquareInch(42.0))->toPascal())->toEqualWithDelta(new Pascal(289579.806313056), 0.000001);
    expect((new StandardAtmosphere(42.0))->toPascal())->toEqualWithDelta(new Pascal(4255650.0), 0.000001);
    expect((new Torr(42.0))->toPascal())->toEqualWithDelta(new Pascal(5599.539473682), 0.000001);
});
