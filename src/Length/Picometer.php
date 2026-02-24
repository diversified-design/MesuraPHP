<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Picometer extends MetricLength
{
    protected static string $defaultSymbol = 'pm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
