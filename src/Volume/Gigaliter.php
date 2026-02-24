<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Gigaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Gl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
