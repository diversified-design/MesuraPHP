<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Centigram extends MetricWeight
{
    protected static string $defaultSymbol = 'cg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
