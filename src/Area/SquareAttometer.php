<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareAttometer extends MetricArea
{
    protected static string $defaultSymbol = 'am²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Atto;
    }
}
