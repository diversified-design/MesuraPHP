<?php

declare(strict_types=1);

use MeasurementUnit\Length\SurveyMile;

test(
    'symbol is mi',
    fn () => expect(SurveyMile::getSymbol())->toBe('mi')
);

test(
    'creates from meter value',
    fn () => expect(SurveyMile::fromMeterValue(42.0)->getValue())->toEqualWithDelta(0.02609753818, 0.000001)
);

test(
    'converts to meter value',
    fn () => expect((new SurveyMile(42.0))->toMeterValue())->toEqualWithDelta(67592.5824, 0.000001)
);
