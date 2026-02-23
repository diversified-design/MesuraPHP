<?php

declare(strict_types=1);

use MeasurementUnit\Angle\Degree;

test(
    'symbol is °',
    fn () => expect(Degree::getSymbol())->toBe('°')
);

test(
    'creates from radian value',
    fn () => expect(Degree::fromRadianValue(42.0)->getValue())->toEqualWithDelta(2406.4227395494577, 0.000001)
);

test(
    'converts to radian value',
    fn () => expect((new Degree(42.0))->toRadianValue())->toEqualWithDelta(0.7330382858376184, 0.000001)
);
