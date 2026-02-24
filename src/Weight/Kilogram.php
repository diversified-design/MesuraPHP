<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Kilogram extends MetricWeight
{
    protected static string $defaultSymbol = 'kg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
