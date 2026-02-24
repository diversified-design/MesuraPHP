<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Femtometer extends MetricLength
{
    protected static string $defaultSymbol = 'fm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
