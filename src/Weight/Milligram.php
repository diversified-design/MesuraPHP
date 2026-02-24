<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Milligram extends MetricWeight
{
    protected static string $defaultSymbol = 'mg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
