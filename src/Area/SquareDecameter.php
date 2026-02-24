<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareDecameter extends MetricArea
{
    protected static string $defaultSymbol = 'dam²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
