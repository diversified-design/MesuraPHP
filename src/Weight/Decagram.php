<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Decagram extends MetricWeight
{
    protected static string $defaultSymbol = 'dag';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
