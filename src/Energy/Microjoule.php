<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Microjoule extends MetricJoule
{
    protected static string $defaultSymbol = 'μJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
