<?php

declare(strict_types=1);

use Mesura\Percentage\PartsPerMillion;

test(
    'symbol is ppm',
    fn () => expect(PartsPerMillion::getSymbol())->toBe('ppm')
);

test(
    'creates from ratio value',
    fn () => expect(PartsPerMillion::fromRatioValue(0.0005)->getValue())->toEqualWithDelta(500.0, 0.000001)
);

test(
    'converts to ratio value',
    fn () => expect((new PartsPerMillion(500.0))->toRatioValue())->toEqualWithDelta(0.0005, 0.000001)
);

test(
    'converts to percent',
    fn () => expect((new PartsPerMillion(10000.0))->toPercent()->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to parts per billion',
    fn () => expect((new PartsPerMillion(1.0))->toPartsPerBillion()->getValue())->toEqualWithDelta(1000.0, 0.000001)
);
