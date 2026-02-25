<?php

declare(strict_types=1);

use Mesura\ArealDensity\OuncePerSquareYard;

test(
    'symbol is oz/yd²',
    fn () => expect(OuncePerSquareYard::getSymbol())->toBe('oz/yd²')
);

test(
    'creates from kilogram per square meter value',
    fn () => expect(OuncePerSquareYard::fromKilogramPerSquareMeterValue(0.033905747)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to kilogram per square meter value',
    fn () => expect((new OuncePerSquareYard(1.0))->toKilogramPerSquareMeterValue())->toEqualWithDelta(0.033905747, 1e-6)
);
