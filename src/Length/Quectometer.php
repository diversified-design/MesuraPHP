<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Quectometer extends MetricLength
{
    protected static string $defaultSymbol = 'qm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
