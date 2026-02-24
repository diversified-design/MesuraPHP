<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Decameter extends MetricLength
{
    protected static string $defaultSymbol = 'dam';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
