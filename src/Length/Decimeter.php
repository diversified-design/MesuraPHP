<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Decimeter extends MetricLength
{
    protected static string $defaultSymbol = 'dm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
