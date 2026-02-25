<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Centijoule extends MetricJoule
{
    protected static string $defaultSymbol = 'cJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
