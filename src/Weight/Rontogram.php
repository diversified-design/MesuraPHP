<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Rontogram extends MetricWeight
{
    protected static string $defaultSymbol = 'rg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
