<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Zettagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Zg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
