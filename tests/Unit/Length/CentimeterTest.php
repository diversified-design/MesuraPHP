<?php

declare(strict_types=1);

use Mesura\Length\Centimeter;

test(
    'symbol is cm',
    fn () => expect(Centimeter::getSymbol())->toBe('cm')
);

test(
    'creates from meter value',
    fn () => expect(Centimeter::fromMeterValue(42.0)->getValue())->toEqualWithDelta(4200.0, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Centimeter(42.0))->toMeterValue())->toEqualWithDelta(0.42, 0.000001)
);
