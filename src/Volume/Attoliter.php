<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Attoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'al';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Atto;
    }
}
