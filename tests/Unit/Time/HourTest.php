<?php

declare(strict_types=1);

use MeasurementUnit\Time\Hour;

test(
    'symbol is h',
    fn () => expect(Hour::getSymbol())->toBe('h')
);

test(
    'creates from second value',
    fn () => expect(Hour::fromSecondValue(42.0)->getValue())->toEqualWithDelta(0.01166666666, 0.000001)
);

test(
    'converts to second value',
    fn () => expect((new Hour(42.0))->toSecondValue())->toEqualWithDelta(151200.0, 0.000001)
);
