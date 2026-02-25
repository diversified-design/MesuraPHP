<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Decijoule extends MetricJoule
{
    protected static string $defaultSymbol = 'dJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
