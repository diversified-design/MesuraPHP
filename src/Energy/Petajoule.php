<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Petajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'PJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
