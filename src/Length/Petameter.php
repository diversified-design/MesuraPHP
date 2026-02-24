<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Petameter extends MetricLength
{
    protected static string $defaultSymbol = 'Pm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
