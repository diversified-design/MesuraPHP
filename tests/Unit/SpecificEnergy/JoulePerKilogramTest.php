<?php

declare(strict_types=1);

use Mesura\SpecificEnergy\JoulePerKilogram;

test(
    'symbol is J/kg',
    fn () => expect(JoulePerKilogram::getSymbol())->toBe('J/kg')
);

test(
    'creates from joule per kilogram value',
    fn () => expect(JoulePerKilogram::fromJoulePerKilogramValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to joule per kilogram value',
    fn () => expect((new JoulePerKilogram(42.0))->toJoulePerKilogramValue())->toBe(42.0)
);
