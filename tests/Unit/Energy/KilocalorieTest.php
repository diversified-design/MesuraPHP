<?php

declare(strict_types=1);

use Mesura\Energy\Kilocalorie;

test(
    'symbol is kcal',
    fn () => expect(Kilocalorie::getSymbol())->toBe('kcal')
);

test(
    'creates from joule value',
    fn () => expect(Kilocalorie::fromJouleValue(4184.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new Kilocalorie(1.0))->toJouleValue())->toEqualWithDelta(4184.0, 0.000001)
);
