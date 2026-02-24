<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareYoctometer extends MetricArea
{
    protected static string $defaultSymbol = 'ym²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
