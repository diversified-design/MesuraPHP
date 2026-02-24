<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Quettaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Ql';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
