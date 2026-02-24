<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Rontogram extends MetricWeight
{
    protected static string $defaultSymbol = 'rg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
