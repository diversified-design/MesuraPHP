<?php

declare(strict_types=1);

use Mesura\MassConcentration\GrainPerCubicFoot;
use Mesura\MassConcentration\GrainPerCubicMeter;
use Mesura\MassConcentration\GramPerCubicMeter;
use Mesura\MassConcentration\KilogramPerCubicMeter;
use Mesura\MassConcentration\MicrogramPerCubicMeter;
use Mesura\MassConcentration\MilligramPerCubicMeter;

dataset('mass concentration units', function () {
    yield KilogramPerCubicMeter::class => [new KilogramPerCubicMeter(42.0)];
    yield GramPerCubicMeter::class => [new GramPerCubicMeter(42.0)];
    yield MilligramPerCubicMeter::class => [new MilligramPerCubicMeter(42.0)];
    yield MicrogramPerCubicMeter::class => [new MicrogramPerCubicMeter(42.0)];
    yield GrainPerCubicMeter::class => [new GrainPerCubicMeter(42.0)];
    yield GrainPerCubicFoot::class => [new GrainPerCubicFoot(42.0)];
});

test('round-trips through kilogram per cubic meter value', function ($mc) {
    expect($mc::fromKilogramPerCubicMeterValue($mc->toKilogramPerCubicMeterValue()))
        ->toEqualWithDelta($mc, 0.000001)
    ;
})->with('mass concentration units');

test('converts at correct rate', function () {
    expect((new KilogramPerCubicMeter(1.0))->toGramPerCubicMeter())->toEqualWithDelta(new GramPerCubicMeter(1000.0), 0.000001);
    expect((new KilogramPerCubicMeter(1.0))->toMilligramPerCubicMeter())->toEqualWithDelta(new MilligramPerCubicMeter(1_000_000.0), 0.000001);
    expect((new KilogramPerCubicMeter(1.0))->toMicrogramPerCubicMeter())->toEqualWithDelta(new MicrogramPerCubicMeter(1_000_000_000.0), 0.000001);
    expect((new GramPerCubicMeter(1000.0))->toKilogramPerCubicMeter())->toEqualWithDelta(new KilogramPerCubicMeter(1.0), 0.000001);
    expect((new MicrogramPerCubicMeter(1_000_000.0))->toMilligramPerCubicMeter())->toEqualWithDelta(new MilligramPerCubicMeter(1000.0), 0.000001);
});
