<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareMegameter extends MetricArea
{
    protected static string $defaultSymbol = 'Mm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
