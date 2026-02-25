<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Hectojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'hJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
