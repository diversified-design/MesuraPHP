<?php

declare(strict_types=1);

use MeasurementUnit\Torque\NewtonMeter;

test(
    'symbol is N⋅m',
    fn () => expect(NewtonMeter::getSymbol())->toBe('N⋅m')
);

test(
    'creates from newton meter value',
    fn () => expect(NewtonMeter::fromNewtonMeterValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to newton meter value',
    fn () => expect((new NewtonMeter(42.0))->toNewtonMeterValue())->toBe(42.0)
);
