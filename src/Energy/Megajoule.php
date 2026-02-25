<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Megajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'MJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
