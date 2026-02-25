<?php

declare(strict_types=1);

use Mesura\ArealDensity\GramPerSquareMeter;
use Mesura\ArealDensity\KilogramPerSquareMeter;
use Mesura\ArealDensity\OuncePerSquareYard;
use Mesura\ArealDensity\PoundPerSquareFoot;

dataset('areal density units', function () {
    yield KilogramPerSquareMeter::class => [new KilogramPerSquareMeter(42.0)];
    yield GramPerSquareMeter::class => [new GramPerSquareMeter(42.0)];
    yield OuncePerSquareYard::class => [new OuncePerSquareYard(42.0)];
    yield PoundPerSquareFoot::class => [new PoundPerSquareFoot(42.0)];
});

test('round-trips through kilogram per square meter value', function ($ad) {
    expect($ad::fromKilogramPerSquareMeterValue($ad->toKilogramPerSquareMeterValue()))
        ->toEqualWithDelta($ad, 0.000001)
    ;
})->with('areal density units');

test('converts at correct rate', function () {
    // 80 GSM paper = 0.08 kg/m²
    expect((new GramPerSquareMeter(80.0))->toKilogramPerSquareMeter())->toEqualWithDelta(new KilogramPerSquareMeter(0.08), 0.000001);
    expect((new KilogramPerSquareMeter(1.0))->toGramPerSquareMeter())->toEqualWithDelta(new GramPerSquareMeter(1000.0), 0.000001);
    expect((new PoundPerSquareFoot(1.0))->toKilogramPerSquareMeter())->toEqualWithDelta(new KilogramPerSquareMeter(4.88242764), 0.0001);
});
