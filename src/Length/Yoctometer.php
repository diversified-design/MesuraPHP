<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Yoctometer extends MetricLength
{
    protected static string $defaultSymbol = 'ym';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
