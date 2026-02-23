<?php

declare(strict_types=1);

use MeasurementUnit\Length\Furlong;

test(
    'symbol is fur',
    fn () => expect(Furlong::getSymbol())->toBe('fur')
);

test(
    'creates from meter value',
    fn () => expect(Furlong::fromMeterValue(42.0)->getValue())->toEqualWithDelta(0.20878072059, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Furlong(42.0))->toMeterValue())->toEqualWithDelta(8449.056, 0.000001)
);
