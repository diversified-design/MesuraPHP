<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareCentimeter extends MetricArea
{
    protected static string $defaultSymbol = 'cm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
