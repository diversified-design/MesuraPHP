<?php

declare(strict_types=1);

use Mesura\Pressure\MillimetreOfMercury;

test(
    'symbol is mmHg',
    fn () => expect(MillimetreOfMercury::getSymbol())->toBe('mmHg')
);

test(
    'creates from pascal value',
    fn () => expect(MillimetreOfMercury::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.315026, 0.0001)
);

test(
    'converts to pascal value',
    fn () => expect((new MillimetreOfMercury(42.0))->toPascalValue())->toEqualWithDelta(5599.54027143, 0.000001)
);
