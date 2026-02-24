<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Quettameter extends MetricLength
{
    protected static string $defaultSymbol = 'Qm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
