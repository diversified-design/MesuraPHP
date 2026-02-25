<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Kilowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'kW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
