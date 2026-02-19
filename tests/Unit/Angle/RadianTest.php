<?php

declare(strict_types=1);

use MeasurementUnit\Angle\Radian;

test('symbol is rad', fn () =>
    expect(Radian::getSymbol())->toBe('rad')
);

test('creates from radian value', fn () =>
    expect(Radian::fromRadianValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test('converts to radian value', fn () =>
    expect((new Radian(42.0))->toRadianValue())->toBe(42.0)
);
