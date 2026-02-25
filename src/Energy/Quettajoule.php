<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Quettajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'QJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
