<?php

declare(strict_types=1);

use MeasurementUnit\Volume\CubicYard;

test(
    'symbol is yd³',
    fn () => expect(CubicYard::getSymbol())->toBe('yd³')
);

test(
    'creates from cubic meter value',
    fn () => expect(CubicYard::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(54.9339158072, 0.000001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new CubicYard(42.0))->toCubicMeterValue())->toEqualWithDelta(32.11131, 0.000001)
);
