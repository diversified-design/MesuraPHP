<?php

declare(strict_types=1);

use Mesura\Percentage\PartsPerBillion;

test(
    'symbol is ppb',
    fn () => expect(PartsPerBillion::getSymbol())->toBe('ppb')
);

test(
    'creates from ratio value',
    fn () => expect(PartsPerBillion::fromRatioValue(0.000001)->getValue())->toEqualWithDelta(1000.0, 0.000001)
);

test(
    'converts to ratio value',
    fn () => expect((new PartsPerBillion(1000.0))->toRatioValue())->toEqualWithDelta(0.000001, 0.000001)
);

test(
    'converts to percent',
    fn () => expect((new PartsPerBillion(1000000000.0))->toPercent()->getValue())->toEqualWithDelta(100.0, 0.000001)
);

test(
    'converts to parts per million',
    fn () => expect((new PartsPerBillion(1000.0))->toPartsPerMillion()->getValue())->toEqualWithDelta(1.0, 0.000001)
);
