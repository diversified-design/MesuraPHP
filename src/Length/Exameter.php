<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Exameter extends MetricLength
{
    protected static string $defaultSymbol = 'Em';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
