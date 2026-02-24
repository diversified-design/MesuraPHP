<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Hectogram extends MetricWeight
{
    protected static string $defaultSymbol = 'hg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
