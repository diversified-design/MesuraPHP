<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Kilometer extends MetricLength
{
    protected static string $defaultSymbol = 'km';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
