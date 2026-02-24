<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Yottameter extends MetricLength
{
    protected static string $defaultSymbol = 'Ym';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
