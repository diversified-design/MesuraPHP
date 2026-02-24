<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Megagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Mg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
