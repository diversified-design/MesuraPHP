<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Picojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'pJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
