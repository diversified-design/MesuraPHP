<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Rontojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'rJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
