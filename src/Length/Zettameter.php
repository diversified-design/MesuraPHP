<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Zettameter extends MetricLength
{
    protected static string $defaultSymbol = 'Zm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
