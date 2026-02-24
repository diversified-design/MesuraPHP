<?php

declare(strict_types=1);

use Mesura\Pressure\PoundPerSquareInch;

test(
    'symbol is psi',
    fn () => expect(PoundPerSquareInch::getSymbol())->toBe('psi')
);

test(
    'creates from pascal value',
    fn () => expect(PoundPerSquareInch::fromPascalValue(42.0)->getValue())->toEqualWithDelta(0.00609156, 0.000001)
);

test(
    'converts to pascal value',
    fn () => expect((new PoundPerSquareInch(42.0))->toPascalValue())->toEqualWithDelta(289579.806313056, 0.000001)
);
