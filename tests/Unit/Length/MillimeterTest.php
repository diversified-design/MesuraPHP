<?php

declare(strict_types=1);

use MeasurementUnit\Length\Millimeter;

test(
    'symbol is mm',
    fn () => expect(Millimeter::getSymbol())->toBe('mm')
);

test(
    'creates from meter value',
    fn () => expect(Millimeter::fromMeterValue(42.0)->getValue())->toEqualWithDelta(42000.0, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Millimeter(42.0))->toMeterValue())->toEqualWithDelta(0.042, 0.000001)
);
