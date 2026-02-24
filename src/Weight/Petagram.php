<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Petagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Pg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
