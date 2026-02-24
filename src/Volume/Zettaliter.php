<?php

declare(strict_types=1);

namespace MeasurementUnit\Volume;

use MeasurementUnit\MetricPrefix;

class Zettaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Zl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
