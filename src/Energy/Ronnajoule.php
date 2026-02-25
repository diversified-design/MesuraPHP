<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Ronnajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'RJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
