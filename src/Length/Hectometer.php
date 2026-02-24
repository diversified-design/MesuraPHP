<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Hectometer extends MetricLength
{
    protected static string $defaultSymbol = 'hm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
