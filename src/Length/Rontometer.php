<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Rontometer extends MetricLength
{
    protected static string $defaultSymbol = 'rm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
