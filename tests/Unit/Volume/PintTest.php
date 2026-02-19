<?php

declare(strict_types=1);

use MeasurementUnit\Volume\Pint;

test('symbol is pt', fn () =>
    expect(Pint::getSymbol())->toBe('pt')
);

test('creates from cubic meter value', fn () =>
    expect(Pint::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(88761.8983211, 0.01)
);

test('converts to cubic meter value', fn () =>
    expect((new Pint(42.0))->toCubicMeterValue())->toEqualWithDelta(0.019873392, 0.000001)
);
