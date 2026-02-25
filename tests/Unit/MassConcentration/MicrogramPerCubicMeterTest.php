<?php

declare(strict_types=1);

use Mesura\MassConcentration\MicrogramPerCubicMeter;

test(
    'symbol is μg/m³',
    fn () => expect(MicrogramPerCubicMeter::getSymbol())->toBe('μg/m³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(MicrogramPerCubicMeter::fromKilogramPerCubicMeterValue(1.0)->getValue())->toEqualWithDelta(1_000_000_000.0, 0.000001)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new MicrogramPerCubicMeter(1_000_000_000.0))->toKilogramPerCubicMeterValue())->toEqualWithDelta(1.0, 0.000001)
);
