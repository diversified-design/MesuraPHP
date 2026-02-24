<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareRonnameter extends MetricArea
{
    protected static string $defaultSymbol = 'Rm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
