<?php

declare(strict_types=1);

use Mesura\Irradiance\BtuPerHourPerSquareFoot;

test(
    'symbol is BTU/(h⋅ft²)',
    fn () => expect(BtuPerHourPerSquareFoot::getSymbol())->toBe('BTU/(h⋅ft²)')
);

test(
    'creates from watt per square meter value',
    fn () => expect(BtuPerHourPerSquareFoot::fromWattPerSquareMeterValue(3.15459)->getValue())->toEqualWithDelta(1.0, 0.001)
);

test(
    'converts to watt per square meter value',
    fn () => expect((new BtuPerHourPerSquareFoot(1.0))->toWattPerSquareMeterValue())->toEqualWithDelta(3.15459, 0.001)
);
