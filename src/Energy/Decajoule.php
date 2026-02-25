<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Decajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'daJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
