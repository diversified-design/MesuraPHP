<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareYottameter extends MetricArea
{
    protected static string $defaultSymbol = 'Ym²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
