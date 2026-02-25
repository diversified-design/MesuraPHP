<?php

declare(strict_types=1);

use Mesura\Volume\ImperialPint;

test(
    'symbol is imp pt',
    fn () => expect(ImperialPint::getSymbol())->toBe('imp pt')
);

test(
    'creates from cubic meter value',
    fn () => expect(ImperialPint::fromCubicMeterValue(0.00056826125)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new ImperialPint(1.0))->toCubicMeterValue())->toEqualWithDelta(0.00056826125, 0.0000001)
);
