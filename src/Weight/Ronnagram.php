<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Ronnagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Rg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
