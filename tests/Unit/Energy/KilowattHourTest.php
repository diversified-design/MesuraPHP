<?php

declare(strict_types=1);

use Mesura\Energy\KilowattHour;

test(
    'symbol is kWh',
    fn () => expect(KilowattHour::getSymbol())->toBe('kWh')
);

test(
    'creates from joule value',
    fn () => expect(KilowattHour::fromJouleValue(3_600_000.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new KilowattHour(1.0))->toJouleValue())->toEqualWithDelta(3_600_000.0, 0.000001)
);
