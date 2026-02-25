<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\MegajoulePerKilogram;

test(
    'symbol is MJ/kg',
    fn () => expect(MegajoulePerKilogram::getSymbol())->toBe('MJ/kg')
);

test(
    'creates from joule per kilogram value',
    fn () => expect(MegajoulePerKilogram::fromJoulePerKilogramValue(1_000_000.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule per kilogram value',
    fn () => expect((new MegajoulePerKilogram(1.0))->toJoulePerKilogramValue())->toEqualWithDelta(1_000_000.0, 0.000001)
);
