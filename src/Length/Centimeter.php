<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Centimeter extends MetricLength
{
    protected static string $defaultSymbol = 'cm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
