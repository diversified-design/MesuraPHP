<?php

declare(strict_types=1);

use MeasurementUnit\Length\Kilometer;

test(
    'symbol is km',
    fn () => expect(Kilometer::getSymbol())->toBe('km')
);

test(
    'creates from meter value',
    fn () => expect(Kilometer::fromMeterValue(42.0)->getValue())->toEqualWithDelta(0.042, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Kilometer(42.0))->toMeterValue())->toEqualWithDelta(42000.0, 0.000001)
);
