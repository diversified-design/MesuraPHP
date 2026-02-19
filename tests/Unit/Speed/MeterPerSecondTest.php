<?php

declare(strict_types=1);

use MeasurementUnit\Speed\MeterPerSecond;

test('symbol is m/s', fn () =>
    expect(MeterPerSecond::getSymbol())->toBe('m/s')
);

test('creates from meter per second value', fn () =>
    expect(MeterPerSecond::fromMeterPerSecondValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test('converts to meter per second value', fn () =>
    expect((new MeterPerSecond(42.0))->toMeterPerSecondValue())->toBe(42.0)
);
