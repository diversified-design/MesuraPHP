<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Picoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'pl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
