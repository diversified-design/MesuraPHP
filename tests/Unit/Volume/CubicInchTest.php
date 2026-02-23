<?php

declare(strict_types=1);

use MeasurementUnit\Volume\CubicInch;

test(
    'symbol is in³',
    fn () => expect(CubicInch::getSymbol())->toBe('in³')
);

test(
    'creates from cubic meter value',
    fn () => expect(CubicInch::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(2562991.62146, 0.01)
);

test(
    'converts to cubic meter value',
    fn () => expect((new CubicInch(42.0))->toCubicMeterValue())->toEqualWithDelta(0.0006882582, 0.000001)
);
