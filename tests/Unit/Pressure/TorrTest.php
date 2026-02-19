<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Torr;

test('symbol is Torr', fn () =>
    expect(Torr::getSymbol())->toBe('Torr')
);

test('creates from pascal value', fn () =>
    expect(Torr::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.315026, 0.0001)
);

test('converts to pascal value', fn () =>
    expect((new Torr(42.0))->toPascalValue())->toEqualWithDelta(5599.53947368, 0.000001)
);
