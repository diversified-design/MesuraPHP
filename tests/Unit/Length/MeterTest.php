<?php

declare(strict_types=1);

use MeasurementUnit\Length\Meter;

test('symbol is m', fn () =>
    expect(Meter::getSymbol())->toBe('m')
);

test('creates from meter value', fn () =>
    expect(Meter::fromMeterValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test('converts to meter value', fn () =>
    expect((new Meter(42.0))->toMeterValue())->toBe(42.0)
);
