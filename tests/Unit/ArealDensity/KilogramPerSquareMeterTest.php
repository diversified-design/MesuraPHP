<?php

declare(strict_types=1);

use Mesura\ArealDensity\KilogramPerSquareMeter;

test(
    'symbol is kg/m²',
    fn () => expect(KilogramPerSquareMeter::getSymbol())->toBe('kg/m²')
);

test(
    'creates from kilogram per square meter value',
    fn () => expect(KilogramPerSquareMeter::fromKilogramPerSquareMeterValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to kilogram per square meter value',
    fn () => expect((new KilogramPerSquareMeter(42.0))->toKilogramPerSquareMeterValue())->toBe(42.0)
);
