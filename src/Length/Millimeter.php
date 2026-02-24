<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Millimeter extends MetricLength
{
    protected static string $defaultSymbol = 'mm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
