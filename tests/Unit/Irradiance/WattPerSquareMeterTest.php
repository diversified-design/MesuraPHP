<?php

declare(strict_types=1);

use Mesura\Irradiance\WattPerSquareMeter;

test(
    'symbol is W/m²',
    fn () => expect(WattPerSquareMeter::getSymbol())->toBe('W/m²')
);

test(
    'creates from watt per square meter value',
    fn () => expect(WattPerSquareMeter::fromWattPerSquareMeterValue(42.0)->getValue())->toBe(42.0)
);

test(
    'converts to watt per square meter value',
    fn () => expect((new WattPerSquareMeter(42.0))->toWattPerSquareMeterValue())->toBe(42.0)
);
