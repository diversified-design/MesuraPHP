<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Zeptometer extends MetricLength
{
    protected static string $defaultSymbol = 'zm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
