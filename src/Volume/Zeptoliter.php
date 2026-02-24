<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Zeptoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'zl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
