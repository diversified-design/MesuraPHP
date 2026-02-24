<?php

declare(strict_types=1);

use Mesura\Speed\KilometerPerHour;

test(
    'symbol is km/h',
    fn () => expect(KilometerPerHour::getSymbol())->toBe('km/h')
);

test(
    'creates from meter per second value',
    fn () => expect(KilometerPerHour::fromMeterPerSecondValue(42.0)->getValue())->toEqualWithDelta(151.19987904, 0.000001)
);

test(
    'converts to meter per second value',
    fn () => expect((new KilometerPerHour(42.0))->toMeterPerSecondValue())->toEqualWithDelta(11.666676, 0.000001)
);
