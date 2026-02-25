<?php

declare(strict_types=1);

use Mesura\ArealDensity\GramPerSquareMeter;

test(
    'symbol is g/m²',
    fn () => expect(GramPerSquareMeter::getSymbol())->toBe('g/m²')
);

test(
    'creates from kilogram per square meter value',
    fn () => expect(GramPerSquareMeter::fromKilogramPerSquareMeterValue(1.0)->getValue())->toEqualWithDelta(1000.0, 0.000001)
);

test(
    'converts to kilogram per square meter value',
    fn () => expect((new GramPerSquareMeter(1000.0))->toKilogramPerSquareMeterValue())->toEqualWithDelta(1.0, 0.000001)
);
