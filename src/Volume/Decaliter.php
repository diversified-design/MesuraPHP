<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Decaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'dal';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
