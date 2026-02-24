<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Milligram extends MetricWeight
{
    protected static string $defaultSymbol = 'mg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
