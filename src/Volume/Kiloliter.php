<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Kiloliter extends MetricLiter
{
    protected static string $defaultSymbol = 'kl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
