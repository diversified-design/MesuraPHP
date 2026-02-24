<?php

declare(strict_types=1);

use Mesura\Temperature\Rankine;

test(
    'symbol is °R',
    fn () => expect(Rankine::getSymbol())->toBe('°R')
);

test(
    'creates from kelvin value',
    fn () => expect(Rankine::fromKelvinValue(42.0)->getValue())->toEqualWithDelta(75.6, 0.000001)
);

test(
    'converts to kelvin value',
    fn () => expect((new Rankine(42.0))->toKelvinValue())->toEqualWithDelta(23.3333333333, 0.000001)
);
