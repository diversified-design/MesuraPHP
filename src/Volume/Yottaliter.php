<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Yottaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Yl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
