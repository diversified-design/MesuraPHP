<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Femtojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'fJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
