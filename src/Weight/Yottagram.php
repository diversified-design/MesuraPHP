<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Yottagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Yg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
