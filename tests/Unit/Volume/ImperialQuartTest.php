<?php

declare(strict_types=1);

use Mesura\Volume\ImperialQuart;

test(
    'symbol is imp qt',
    fn () => expect(ImperialQuart::getSymbol())->toBe('imp qt')
);

test(
    'creates from cubic meter value',
    fn () => expect(ImperialQuart::fromCubicMeterValue(0.0011365225)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to cubic meter value',
    fn () => expect((new ImperialQuart(1.0))->toCubicMeterValue())->toEqualWithDelta(0.0011365225, 0.0000001)
);
