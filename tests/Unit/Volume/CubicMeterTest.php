<?php

declare(strict_types=1);

use Mesura\Volume\CubicMeter;

test(
    'symbol is m³',
    fn () => expect(CubicMeter::getSymbol())->toBe('m³')
);

test(
    'creates from cubic meter value',
    fn () => expect(CubicMeter::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new CubicMeter(42.0))->toCubicMeterValue())->toBe(42.0)
);
