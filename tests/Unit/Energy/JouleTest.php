<?php

declare(strict_types=1);

use Mesura\Energy\Joule;

test(
    'symbol is J',
    fn () => expect(Joule::getSymbol())->toBe('J')
);

test(
    'creates from joule value',
    fn () => expect(Joule::fromJouleValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to joule value',
    fn () => expect((new Joule(42.0))->toJouleValue())->toBe(42.0)
);
