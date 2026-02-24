<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Attogram extends MetricWeight
{
    protected static string $defaultSymbol = 'ag';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Atto;
    }
}
