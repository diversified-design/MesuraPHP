<?php

declare(strict_types=1);

namespace MeasurementUnit\Area;

use MeasurementUnit\MetricPrefix;

class SquareFemtometer extends MetricArea
{
    protected static string $defaultSymbol = 'fm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
