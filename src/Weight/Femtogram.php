<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Femtogram extends MetricWeight
{
    protected static string $defaultSymbol = 'fg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
