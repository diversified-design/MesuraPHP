<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Quettagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Qg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
