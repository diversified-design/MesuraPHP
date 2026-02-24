<?php

declare(strict_types=1);

use Mesura\Speed\Knot;

test(
    'symbol is kn',
    fn () => expect(Knot::getSymbol())->toBe('kn')
);

test(
    'creates from meter per second value',
    fn () => expect(Knot::fromMeterPerSecondValue(42.0)->getValue())->toEqualWithDelta(81.6415392151, 0.000001)
);

test(
    'converts to meter per second value',
    fn () => expect((new Knot(42.0))->toMeterPerSecondValue())->toEqualWithDelta(21.606648, 0.000001)
);
