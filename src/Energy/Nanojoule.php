<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Nanojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'nJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
