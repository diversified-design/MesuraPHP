<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Femtoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'fl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
