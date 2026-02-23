<?php

declare(strict_types=1);

use MeasurementUnit\Volume\Liter;

test(
    'symbol is l',
    fn () => expect(Liter::getSymbol())->toBe('l')
);

test(
    'creates from cubic meter value',
    fn () => expect(Liter::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(42000.0, 0.000001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new Liter(42.0))->toCubicMeterValue())->toEqualWithDelta(0.042, 0.000001)
);
