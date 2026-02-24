<?php

declare(strict_types=1);

use Mesura\Weight\Pound;

test(
    'symbol is lb',
    fn () => expect(Pound::getSymbol())->toBe('lb')
);

test(
    'creates from kilogram value',
    fn () => expect(Pound::fromKilogramValue(42.0)->getValue())->toEqualWithDelta(92.5942256477, 0.000001)
);

test(
    'converts to kilogram value',
    fn () => expect((new Pound(42.0))->toKilogramValue())->toEqualWithDelta(19.050864, 0.000001)
);
