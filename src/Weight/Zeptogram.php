<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Zeptogram extends MetricWeight
{
    protected static string $defaultSymbol = 'zg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
