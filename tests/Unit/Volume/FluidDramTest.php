<?php

declare(strict_types=1);

use MeasurementUnit\Volume\FluidDram;

test('symbol is fl dr', fn () =>
    expect(FluidDram::getSymbol())->toBe('fl dr')
);

test('creates from cubic meter value', fn () =>
    expect(FluidDram::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(11361511.6134, 1.0)
);

test('converts to cubic meter value', fn () =>
    expect((new FluidDram(42.0))->toCubicMeterValue())->toEqualWithDelta(0.00015526103, 0.000001)
);
