<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Exajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'EJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
