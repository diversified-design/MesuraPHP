<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Rontoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'rl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
