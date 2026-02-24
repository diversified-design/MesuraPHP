<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Terameter extends MetricLength
{
    protected static string $defaultSymbol = 'Tm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
