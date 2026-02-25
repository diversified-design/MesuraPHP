<?php

declare(strict_types=1);

use Mesura\Power\BtuPerHour;
use Mesura\Power\CaloriePerSecond;
use Mesura\Power\FootPoundPerSecond;
use Mesura\Power\Horsepower;
use Mesura\Power\Kilowatt;
use Mesura\Power\Megawatt;
use Mesura\Power\Watt;

dataset('power units', function () {
    yield Watt::class => [new Watt(42.0)];
    yield Kilowatt::class => [new Kilowatt(42.0)];
    yield Megawatt::class => [new Megawatt(42.0)];
    yield Horsepower::class => [new Horsepower(42.0)];
    yield BtuPerHour::class => [new BtuPerHour(42.0)];
    yield FootPoundPerSecond::class => [new FootPoundPerSecond(42.0)];
    yield CaloriePerSecond::class => [new CaloriePerSecond(42.0)];
});

test('round-trips through watt value', function ($power) {
    expect($power::fromWattValue($power->toWattValue()))
        ->toEqualWithDelta($power, 0.000001)
    ;
})->with('power units');

test('converts at correct rate', function () {
    expect((new Kilowatt(1.0))->toWatt())->toEqualWithDelta(new Watt(1000.0), 0.000001);
    expect((new Horsepower(1.0))->toWatt())->toEqualWithDelta(new Watt(745.69987158227022), 0.0001);
    expect((new Kilowatt(0.74569987158227022))->toHorsepower())->toEqualWithDelta(new Horsepower(1.0), 0.000001);
    expect((new CaloriePerSecond(1.0))->toWatt())->toEqualWithDelta(new Watt(4.184), 0.000001);
    expect((new BtuPerHour(1.0))->toWatt())->toEqualWithDelta(new Watt(0.29307107), 0.000001);
});
