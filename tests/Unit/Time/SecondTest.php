<?php

declare(strict_types=1);

use MeasurementUnit\Time\Second;

test(
    'symbol is s',
    fn () => expect(Second::getSymbol())->toBe('s')
);

test(
    'creates from second value',
    fn () => expect(Second::fromSecondValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to second value',
    fn () => expect((new Second(42.0))->toSecondValue())->toBe(42.0)
);
