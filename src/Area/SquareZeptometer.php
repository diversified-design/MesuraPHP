<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareZeptometer extends MetricArea
{
    protected static string $defaultSymbol = 'zm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
