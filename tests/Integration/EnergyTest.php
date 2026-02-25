<?php

declare(strict_types=1);

use Mesura\Energy\BritishThermalUnit;
use Mesura\Energy\Calorie;
use Mesura\Energy\FootPound;
use Mesura\Energy\Joule;
use Mesura\Energy\Kilocalorie;
use Mesura\Energy\Kilojoule;
use Mesura\Energy\KilowattHour;
use Mesura\Energy\Megajoule;
use Mesura\Energy\WattHour;

dataset('energy units', function () {
    yield Joule::class => [new Joule(42.0)];
    yield Kilojoule::class => [new Kilojoule(42.0)];
    yield Megajoule::class => [new Megajoule(42.0)];
    yield Calorie::class => [new Calorie(42.0)];
    yield Kilocalorie::class => [new Kilocalorie(42.0)];
    yield BritishThermalUnit::class => [new BritishThermalUnit(42.0)];
    yield WattHour::class => [new WattHour(42.0)];
    yield KilowattHour::class => [new KilowattHour(42.0)];
    yield FootPound::class => [new FootPound(42.0)];
});

test('round-trips through joule value', function ($energy) {
    expect($energy::fromJouleValue($energy->toJouleValue()))
        ->toEqualWithDelta($energy, 0.000001)
    ;
})->with('energy units');

test('converts at correct rate', function () {
    expect((new Joule(4.184))->toCalorie())->toEqualWithDelta(new Calorie(1.0), 0.000001);
    expect((new Kilocalorie(1.0))->toCalorie())->toEqualWithDelta(new Calorie(1000.0), 0.000001);
    expect((new KilowattHour(1.0))->toJoule())->toEqualWithDelta(new Joule(3_600_000.0), 0.000001);
    expect((new BritishThermalUnit(1.0))->toJoule())->toEqualWithDelta(new Joule(1055.05585262), 0.000001);
    expect((new Kilojoule(1.0))->toJoule())->toEqualWithDelta(new Joule(1000.0), 0.000001);
    expect((new WattHour(1.0))->toKilojoule())->toEqualWithDelta(new Kilojoule(3.6), 0.000001);
});
