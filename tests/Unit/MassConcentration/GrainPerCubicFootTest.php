<?php

declare(strict_types=1);

use Mesura\MassConcentration\GrainPerCubicFoot;

test(
    'symbol is gr/ft³',
    fn () => expect(GrainPerCubicFoot::getSymbol())->toBe('gr/ft³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(GrainPerCubicFoot::fromKilogramPerCubicMeterValue(0.002288351)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new GrainPerCubicFoot(1.0))->toKilogramPerCubicMeterValue())->toEqualWithDelta(0.002288351, 1e-6)
);
