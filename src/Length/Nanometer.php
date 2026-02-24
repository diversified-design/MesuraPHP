<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Nanometer extends MetricLength
{
    protected static string $defaultSymbol = 'nm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
