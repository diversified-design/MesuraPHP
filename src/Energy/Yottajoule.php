<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Yottajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'YJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
