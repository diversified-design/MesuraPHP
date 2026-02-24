<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Micrometer extends MetricLength
{
    protected static string $defaultSymbol = 'μm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
