<?php

declare(strict_types=1);

use Mesura\MassConcentration\GramPerCubicMeter;

test(
    'symbol is g/m³',
    fn () => expect(GramPerCubicMeter::getSymbol())->toBe('g/m³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(GramPerCubicMeter::fromKilogramPerCubicMeterValue(1.0)->getValue())->toEqualWithDelta(1000.0, 0.000001)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new GramPerCubicMeter(1000.0))->toKilogramPerCubicMeterValue())->toEqualWithDelta(1.0, 0.000001)
);
