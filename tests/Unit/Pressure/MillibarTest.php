<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Millibar;

test('symbol is mbar', fn () =>
    expect(Millibar::getSymbol())->toBe('mbar')
);

test('creates from pascal value', fn () =>
    expect(Millibar::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.42, 0.000001)
);

test('converts to pascal value', fn () =>
    expect((new Millibar(42.0))->toPascalValue())->toEqualWithDelta(4200.0, 0.000001)
);
