<?php

declare(strict_types=1);

use Mesura\Energy\Calorie;

test(
    'symbol is cal',
    fn () => expect(Calorie::getSymbol())->toBe('cal')
);

test(
    'creates from joule value',
    fn () => expect(Calorie::fromJouleValue(4.184)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule value',
    fn () => expect((new Calorie(1.0))->toJouleValue())->toEqualWithDelta(4.184, 0.000001)
);
