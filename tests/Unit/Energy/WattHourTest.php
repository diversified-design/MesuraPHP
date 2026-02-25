<?php

declare(strict_types=1);

use Mesura\Energy\WattHour;

test(
    'symbol is Wh',
    fn () => expect(WattHour::getSymbol())->toBe('Wh')
);

test(
    'creates from joule value',
    fn () => expect(WattHour::fromJouleValue(3600.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new WattHour(1.0))->toJouleValue())->toEqualWithDelta(3600.0, 0.000001)
);
