<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Quectogram extends MetricWeight
{
    protected static string $defaultSymbol = 'qg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
