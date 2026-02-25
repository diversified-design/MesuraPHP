<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Zettajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'ZJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
