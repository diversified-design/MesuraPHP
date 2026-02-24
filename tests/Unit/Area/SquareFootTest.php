<?php

declare(strict_types=1);

use Mesura\Area\SquareFoot;

test(
    'symbol is ft²',
    fn () => expect(SquareFoot::getSymbol())->toBe('ft²')
);

test(
    'creates from square meter value',
    fn () => expect(SquareFoot::fromSquareMeterValue(42.0)->getValue())->toEqualWithDelta(452.084238, 0.000001)
);

test(
    'converts to square meter value',
    fn () => expect((new SquareFoot(42.0))->toSquareMeterValue())->toEqualWithDelta(3.90192768, 0.000001)
);
