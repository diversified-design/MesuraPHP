<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Exagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Eg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
