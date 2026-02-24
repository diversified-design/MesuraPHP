<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Zeptogram extends MetricWeight
{
    protected static string $defaultSymbol = 'zg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
