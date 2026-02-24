<?php

declare(strict_types=1);

use Mesura\Speed\MilesPerHour;

test(
    'symbol is mph',
    fn () => expect(MilesPerHour::getSymbol())->toBe('mph')
);

test(
    'creates from meter per second value',
    fn () => expect(MilesPerHour::fromMeterPerSecondValue(42.0)->getValue())->toEqualWithDelta(93.9513242663, 0.000001)
);

test(
    'converts to meter per second value',
    fn () => expect((new MilesPerHour(42.0))->toMeterPerSecondValue())->toEqualWithDelta(18.77568, 0.000001)
);
