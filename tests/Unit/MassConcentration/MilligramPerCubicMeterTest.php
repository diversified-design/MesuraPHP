<?php

declare(strict_types=1);

use Mesura\MassConcentration\MilligramPerCubicMeter;

test(
    'symbol is mg/m³',
    fn () => expect(MilligramPerCubicMeter::getSymbol())->toBe('mg/m³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(MilligramPerCubicMeter::fromKilogramPerCubicMeterValue(1.0)->getValue())->toEqualWithDelta(1_000_000.0, 0.000001)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new MilligramPerCubicMeter(1_000_000.0))->toKilogramPerCubicMeterValue())->toEqualWithDelta(1.0, 0.000001)
);
