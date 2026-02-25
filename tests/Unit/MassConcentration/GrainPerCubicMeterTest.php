<?php

declare(strict_types=1);

use Mesura\MassConcentration\GrainPerCubicMeter;

test(
    'symbol is gr/m³',
    fn () => expect(GrainPerCubicMeter::getSymbol())->toBe('gr/m³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(GrainPerCubicMeter::fromKilogramPerCubicMeterValue(0.00006479891)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new GrainPerCubicMeter(1.0))->toKilogramPerCubicMeterValue())->toEqualWithDelta(0.00006479891, 1e-12)
);
