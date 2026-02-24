<?php

declare(strict_types=1);

use Mesura\Pressure\Pascal;

test(
    'symbol is Pa',
    fn () => expect(Pascal::getSymbol())->toBe('Pa')
);

test(
    'creates from pascal value',
    fn () => expect(Pascal::fromPascalValue(42.0)->getValue())->toEqualWithDelta(42.0, 0.000001)
);

test(
    'converts to pascal value',
    fn () => expect((new Pascal(42.0))->toPascalValue())->toBe(42.0)
);
