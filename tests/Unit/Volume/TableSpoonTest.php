<?php

declare(strict_types=1);

use MeasurementUnit\Volume\TableSpoon;

test(
    'symbol is tbsp',
    fn () => expect(TableSpoon::getSymbol())->toBe('tbsp')
);

test(
    'creates from cubic meter value',
    fn () => expect(TableSpoon::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(2840371.14183, 1.0)
);

test(
    'converts to cubic meter value',
    fn () => expect((new TableSpoon(42.0))->toCubicMeterValue())->toEqualWithDelta(0.0006210456, 0.000001)
);
