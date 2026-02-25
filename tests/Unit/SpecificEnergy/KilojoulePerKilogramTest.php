<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\KilojoulePerKilogram;

test(
    'symbol is kJ/kg',
    fn () => expect(KilojoulePerKilogram::getSymbol())->toBe('kJ/kg')
);

test(
    'creates from joule per kilogram value',
    fn () => expect(KilojoulePerKilogram::fromJoulePerKilogramValue(1000.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to joule per kilogram value',
    fn () => expect((new KilojoulePerKilogram(1.0))->toJoulePerKilogramValue())->toEqualWithDelta(1000.0, 0.000001)
);
