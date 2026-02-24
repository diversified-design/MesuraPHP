<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Hectoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'hl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
