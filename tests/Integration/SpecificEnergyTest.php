<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\BtuPerPound;
use Mesura\SpecificEnergy\CaloriePerGram;
use Mesura\SpecificEnergy\JoulePerKilogram;
use Mesura\SpecificEnergy\KilojoulePerKilogram;
use Mesura\SpecificEnergy\MegajoulePerKilogram;

dataset('specific energy units', function () {
    yield JoulePerKilogram::class => [new JoulePerKilogram(42.0)];
    yield KilojoulePerKilogram::class => [new KilojoulePerKilogram(42.0)];
    yield MegajoulePerKilogram::class => [new MegajoulePerKilogram(42.0)];
    yield BtuPerPound::class => [new BtuPerPound(42.0)];
    yield CaloriePerGram::class => [new CaloriePerGram(42.0)];
});

test('round-trips through joule per kilogram value', function ($se) {
    expect($se::fromJoulePerKilogramValue($se->toJoulePerKilogramValue()))
        ->toEqualWithDelta($se, 0.000001)
    ;
})->with('specific energy units');

test('converts at correct rate', function () {
    expect((new KilojoulePerKilogram(1.0))->toJoulePerKilogram())->toEqualWithDelta(new JoulePerKilogram(1000.0), 0.000001);
    expect((new CaloriePerGram(1.0))->toJoulePerKilogram())->toEqualWithDelta(new JoulePerKilogram(4184.0), 0.000001);
    expect((new CaloriePerGram(1.0))->toKilojoulePerKilogram())->toEqualWithDelta(new KilojoulePerKilogram(4.184), 0.000001);
    expect((new MegajoulePerKilogram(1.0))->toKilojoulePerKilogram())->toEqualWithDelta(new KilojoulePerKilogram(1000.0), 0.000001);
});
