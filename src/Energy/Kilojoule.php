<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Kilojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'kJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
