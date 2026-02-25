<?php

declare(strict_types=1);

use Mesura\Power\BtuPerHour;

test(
    'symbol is BTU/h',
    fn () => expect(BtuPerHour::getSymbol())->toBe('BTU/h')
);

test(
    'creates from watt value',
    fn () => expect(BtuPerHour::fromWattValue(1055.05585262 / 3600)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to watt value',
    fn () => expect((new BtuPerHour(1.0))->toWattValue())->toEqualWithDelta(1055.05585262 / 3600, 0.000001)
);
