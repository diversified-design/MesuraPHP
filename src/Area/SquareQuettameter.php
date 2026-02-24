<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareQuettameter extends MetricArea
{
    protected static string $defaultSymbol = 'Qm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
