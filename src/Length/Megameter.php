<?php

declare(strict_types=1);

namespace MeasurementUnit\Length;

use MeasurementUnit\MetricPrefix;

class Megameter extends MetricLength
{
    protected static string $defaultSymbol = 'Mm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
