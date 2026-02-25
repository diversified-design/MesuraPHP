<?php

declare(strict_types=1);

use Mesura\Energy\BritishThermalUnit;

test(
    'symbol is BTU',
    fn () => expect(BritishThermalUnit::getSymbol())->toBe('BTU')
);

test(
    'creates from joule value',
    fn () => expect(BritishThermalUnit::fromJouleValue(1055.05585262)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new BritishThermalUnit(1.0))->toJouleValue())->toEqualWithDelta(1055.05585262, 0.000001)
);
