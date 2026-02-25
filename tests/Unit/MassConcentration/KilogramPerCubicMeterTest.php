<?php

declare(strict_types=1);

use Mesura\MassConcentration\KilogramPerCubicMeter;

test(
    'symbol is kg/m³',
    fn () => expect(KilogramPerCubicMeter::getSymbol())->toBe('kg/m³')
);

test(
    'creates from kilogram per cubic meter value',
    fn () => expect(KilogramPerCubicMeter::fromKilogramPerCubicMeterValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to kilogram per cubic meter value',
    fn () => expect((new KilogramPerCubicMeter(42.0))->toKilogramPerCubicMeterValue())->toBe(42.0)
);
