<?php

declare(strict_types=1);

use Mesura\Volume\ImperialFluidDram;

test(
    'symbol is imp fl dr',
    fn () => expect(ImperialFluidDram::getSymbol())->toBe('imp fl dr')
);

test(
    'creates from cubic meter value',
    fn () => expect(ImperialFluidDram::fromCubicMeterValue(0.0000035516328125)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new ImperialFluidDram(1.0))->toCubicMeterValue())->toEqualWithDelta(0.0000035516328125, 0.0000000001)
);
