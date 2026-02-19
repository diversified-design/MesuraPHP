<?php

declare(strict_types=1);

use MeasurementUnit\Torque\NewtonMeter;

dataset('torque units', function () {
    yield NewtonMeter::class => [new NewtonMeter(42.0)];
});

test('round-trips through newton meter value', function ($torque) {
    expect($torque::fromNewtonMeterValue($torque->toNewtonMeterValue()))
        ->toEqualWithDelta($torque, 0.000001);
})->with('torque units');

test('converts at correct rate', function () {
    expect((new NewtonMeter(42.0))->toNewtonMeter())->toEqualWithDelta(new NewtonMeter(42.0), 0.000001);
});
