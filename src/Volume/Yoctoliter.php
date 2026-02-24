<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Yoctoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'yl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
