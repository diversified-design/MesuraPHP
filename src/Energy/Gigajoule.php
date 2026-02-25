<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Gigajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'GJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
