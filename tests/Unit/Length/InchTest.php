<?php

declare(strict_types=1);

use MeasurementUnit\Length\Inch;

test('symbol is in', fn () =>
    expect(Inch::getSymbol())->toBe('in')
);

test('creates from meter value', fn () =>
    expect(Inch::fromMeterValue(42.0)->getValue())->toEqualWithDelta(1653.54330709, 0.000001)
);

test('converts to meter value', fn () =>
    expect((new Inch(42.0))->toMeterValue())->toEqualWithDelta(1.0668, 0.000001)
);
