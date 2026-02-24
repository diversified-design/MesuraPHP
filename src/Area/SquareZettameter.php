<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareZettameter extends MetricArea
{
    protected static string $defaultSymbol = 'Zm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
