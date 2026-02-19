<?php

declare(strict_types=1);

use MeasurementUnit\Pressure\Kilopascal;

test('symbol is kPa', fn () =>
    expect(Kilopascal::getSymbol())->toBe('kPa')
);

test('creates from pascal value', fn () =>
    expect(Kilopascal::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.042, 0.000001)
);

test('converts to pascal value', fn () =>
    expect((new Kilopascal(42.0))->toPascalValue())->toEqualWithDelta(42000.0, 0.000001)
);
