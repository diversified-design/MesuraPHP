<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Gigameter extends MetricLength
{
    protected static string $defaultSymbol = 'Gm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
