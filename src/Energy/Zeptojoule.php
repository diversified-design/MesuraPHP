<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Zeptojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'zJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
