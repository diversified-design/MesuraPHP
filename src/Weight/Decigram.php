<?php

declare(strict_types=1);

namespace MeasurementUnit\Weight;

use MeasurementUnit\MetricPrefix;

class Decigram extends MetricWeight
{
    protected static string $defaultSymbol = 'dg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
