<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Exagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Eg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
