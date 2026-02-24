<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Quectogram extends MetricWeight
{
    protected static string $defaultSymbol = 'qg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
