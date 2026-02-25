<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\BtuPerPound;

test(
    'symbol is BTU/lb',
    fn () => expect(BtuPerPound::getSymbol())->toBe('BTU/lb')
);

test(
    'creates from joule per kilogram value',
    fn () => expect(BtuPerPound::fromJoulePerKilogramValue(2326.0)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to joule per kilogram value',
    fn () => expect((new BtuPerPound(1.0))->toJoulePerKilogramValue())->toEqualWithDelta(2326.0, 0.1)
);
