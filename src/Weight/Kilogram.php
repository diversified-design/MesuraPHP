<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Kilogram extends MetricWeight
{
    protected static string $defaultSymbol = 'kg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
