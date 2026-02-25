<?php

declare(strict_types=1);

use Mesura\Irradiance\KilowattPerSquareMeter;

test(
    'symbol is kW/m²',
    fn () => expect(KilowattPerSquareMeter::getSymbol())->toBe('kW/m²')
);

test(
    'creates from watt per square meter value',
    fn () => expect(KilowattPerSquareMeter::fromWattPerSquareMeterValue(1000.0)->getValue())->toEqualWithDelta(1.0, 0.000001)
);

test(
    'converts to watt per square meter value',
    fn () => expect((new KilowattPerSquareMeter(1.0))->toWattPerSquareMeterValue())->toEqualWithDelta(1000.0, 0.000001)
);
