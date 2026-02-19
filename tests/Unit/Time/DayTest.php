<?php

declare(strict_types=1);

use MeasurementUnit\Time\Day;

test('symbol is d', fn () =>
    expect(Day::getSymbol())->toBe('d')
);

test('creates from second value', fn () =>
    expect(Day::fromSecondValue(42.0)->getValue())->toEqualWithDelta(0.00048611111, 0.000001)
);

test('converts to second value', fn () =>
    expect((new Day(42.0))->toSecondValue())->toEqualWithDelta(3628800.0, 0.000001)
);
