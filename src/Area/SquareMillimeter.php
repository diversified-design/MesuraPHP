<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareMillimeter extends MetricArea
{
    protected static string $defaultSymbol = 'mm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
