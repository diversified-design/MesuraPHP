<?php

declare(strict_types=1);

use Mesura\Volume\FluidOunce;

test(
    'symbol is fl oz',
    fn () => expect(FluidOunce::getSymbol())->toBe('fl oz')
);

test(
    'creates from cubic meter value',
    fn () => expect(FluidOunce::fromCubicMeterValue(42.0)->getValue())->toEqualWithDelta(1420102.69157, 1.0)
);

test(
    'converts to cubic meter value',
    fn () => expect((new FluidOunce(42.0))->toCubicMeterValue())->toEqualWithDelta(0.00124216369, 0.000001)
);
