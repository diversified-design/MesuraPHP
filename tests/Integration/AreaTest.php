<?php

declare(strict_types=1);

use MeasurementUnit\Area\Acre;
use MeasurementUnit\Area\Hectare;
use MeasurementUnit\Area\SquareFoot;
use MeasurementUnit\Area\SquareKilometer;
use MeasurementUnit\Area\SquareMeter;
use MeasurementUnit\Area\SquareMile;

dataset('area units', function () {
    yield SquareMeter::class     => [new SquareMeter(42.0)];
    yield SquareKilometer::class => [new SquareKilometer(42.0)];
    yield SquareFoot::class      => [new SquareFoot(42.0)];
    yield SquareMile::class      => [new SquareMile(42.0)];
    yield Hectare::class         => [new Hectare(42.0)];
    yield Acre::class            => [new Acre(42.0)];
});

test('round-trips through square meter value', function ($area) {
    expect($area::fromSquareMeterValue($area->toSquareMeterValue()))
        ->toEqualWithDelta($area, 0.000001)
    ;
})->with('area units');

test('converts at correct rate', function () {
    expect((new SquareMeter(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(42.0), 0.000001);
    expect((new SquareKilometer(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(42000000.0), 0.000001);
    expect((new SquareFoot(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(3.90192768), 0.000001);
    expect((new SquareMile(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(108779500.634112), 0.01);
    expect((new Hectare(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(420000.0), 0.000001);
    expect((new Acre(42.0))->toSquareMeter())->toEqualWithDelta(new SquareMeter(169967.969741), 0.01);
});
