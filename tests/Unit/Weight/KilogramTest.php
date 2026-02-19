<?php

declare(strict_types=1);

use MeasurementUnit\Weight\Kilogram;

test('symbol is kg', fn () =>
    expect(Kilogram::getSymbol())->toBe('kg')
);

test('creates from kilogram value', fn () =>
    expect(Kilogram::fromKilogramValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test('converts to kilogram value', fn () =>
    expect((new Kilogram(42.0))->toKilogramValue())->toBe(42.0)
);
