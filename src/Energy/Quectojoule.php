<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Quectojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'qJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
