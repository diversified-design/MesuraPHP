<?php

declare(strict_types=1);

use Mesura\Volume\ImperialFluidOunce;

test(
    'symbol is imp fl oz',
    fn () => expect(ImperialFluidOunce::getSymbol())->toBe('imp fl oz')
);

test(
    'creates from cubic meter value',
    fn () => expect(ImperialFluidOunce::fromCubicMeterValue(0.0000284130625)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new ImperialFluidOunce(1.0))->toCubicMeterValue())->toEqualWithDelta(0.0000284130625, 0.0000000001)
);
