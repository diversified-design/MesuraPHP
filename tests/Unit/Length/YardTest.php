<?php

declare(strict_types=1);

use Mesura\Length\Yard;

test(
    'symbol is yd',
    fn () => expect(Yard::getSymbol())->toBe('yd')
);

test(
    'creates from meter value',
    fn () => expect(Yard::fromMeterValue(42.0)->getValue())->toEqualWithDelta(45.9317585302, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new Yard(42.0))->toMeterValue())->toEqualWithDelta(38.4048, 0.000001)
);
