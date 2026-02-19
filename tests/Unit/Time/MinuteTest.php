<?php

declare(strict_types=1);

use MeasurementUnit\Time\Minute;

test('symbol is min', fn () =>
    expect(Minute::getSymbol())->toBe('min')
);

test('creates from second value', fn () =>
    expect(Minute::fromSecondValue(42.0)->getValue())->toEqualWithDelta(0.7, 0.000001)
);

test('converts to second value', fn () =>
    expect((new Minute(42.0))->toSecondValue())->toEqualWithDelta(2520.0, 0.000001)
);
