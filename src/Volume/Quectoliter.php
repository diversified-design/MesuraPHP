<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Quectoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'ql';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
