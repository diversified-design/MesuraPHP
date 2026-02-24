<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Microliter extends MetricLiter
{
    protected static string $defaultSymbol = 'μl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
