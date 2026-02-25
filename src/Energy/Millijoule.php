<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Millijoule extends MetricJoule
{
    protected static string $defaultSymbol = 'mJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
