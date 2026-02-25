<?php

declare(strict_types=1);

use Mesura\Percentage\Percent;

test(
    'symbol is %',
    fn () => expect(Percent::getSymbol())->toBe('%')
);

test(
    'getValue returns construction value',
    fn () => expect((new Percent(42.0))->getValue())->toBe(42.0)
);

test(
    'creates from ratio value',
    fn () => expect(Percent::fromRatioValue(0.42)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to ratio value',
    fn () => expect((new Percent(42.0))->toRatioValue())->toEqualWithDelta(0.42, 0.000001)
);

test(
    'toDecimal converts to decimal',
    fn () => expect((new Percent(42.0))->toDecimal())->toEqualWithDelta(0.42, 0.000001)
);

test(
    'toCoefficient converts to coefficient',
    fn () => expect((new Percent(42.0))->toCoefficient())->toEqualWithDelta(1.42, 0.000001)
);

test(
    'converts to parts per million',
    fn () => expect((new Percent(1.0))->toPartsPerMillion()->getValue())->toEqualWithDelta(10000.0, 0.000001)
);

test(
    'converts to parts per billion',
    fn () => expect((new Percent(1.0))->toPartsPerBillion()->getValue())->toEqualWithDelta(10000000.0, 0.000001)
);
