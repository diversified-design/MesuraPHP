<?php

declare(strict_types=1);

use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;
use MeasurementUnit\Temperature\Kelvin;
use MeasurementUnit\Temperature\Rankine;

dataset('temperature units', function () {
    yield Celsius::class    => [new Celsius(42.0)];
    yield Fahrenheit::class => [new Fahrenheit(42.0)];
    yield Kelvin::class     => [new Kelvin(42.0)];
    yield Rankine::class    => [new Rankine(42.0)];
});

test('round-trips through kelvin value', function ($temperature) {
    expect($temperature::fromKelvinValue($temperature->toKelvinValue()))
        ->toEqualWithDelta($temperature, 0.000001);
})->with('temperature units');

test('converts at correct rate', function () {
    expect((new Celsius(42.0))->toKelvin())->toEqualWithDelta(new Kelvin(315.15), 0.000001);
    expect((new Fahrenheit(42.0))->toKelvin())->toEqualWithDelta(new Kelvin(278.705555), 0.000001);
    expect((new Kelvin(42.0))->toKelvin())->toEqualWithDelta(new Kelvin(42.0), 0.000001);
    expect((new Rankine(42.0))->toKelvin())->toEqualWithDelta(new Kelvin(23.333333), 0.000001);
});
