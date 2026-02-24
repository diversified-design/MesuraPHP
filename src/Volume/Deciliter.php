<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Deciliter extends MetricLiter
{
    protected static string $defaultSymbol = 'dl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
