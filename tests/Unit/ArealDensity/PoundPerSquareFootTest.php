<?php

declare(strict_types=1);

use Mesura\ArealDensity\PoundPerSquareFoot;

test(
    'symbol is lb/ft²',
    fn () => expect(PoundPerSquareFoot::getSymbol())->toBe('lb/ft²')
);

test(
    'creates from kilogram per square meter value',
    fn () => expect(PoundPerSquareFoot::fromKilogramPerSquareMeterValue(4.88242764)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to kilogram per square meter value',
    fn () => expect((new PoundPerSquareFoot(1.0))->toKilogramPerSquareMeterValue())->toEqualWithDelta(4.88242764, 1e-4)
);
