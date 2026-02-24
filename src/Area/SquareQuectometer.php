<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareQuectometer extends MetricArea
{
    protected static string $defaultSymbol = 'qm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
