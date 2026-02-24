<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Ronnaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Rl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
