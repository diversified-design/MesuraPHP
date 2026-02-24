<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Milliliter extends MetricLiter
{
    protected static string $defaultSymbol = 'ml';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
