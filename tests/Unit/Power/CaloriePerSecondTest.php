<?php

declare(strict_types=1);

use Mesura\Power\CaloriePerSecond;

test(
    'symbol is cal/s',
    fn () => expect(CaloriePerSecond::getSymbol())->toBe('cal/s')
);

test(
    'creates from watt value',
    fn () => expect(CaloriePerSecond::fromWattValue(4.184)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to watt value',
    fn () => expect((new CaloriePerSecond(1.0))->toWattValue())->toEqualWithDelta(4.184, 0.000001)
);
