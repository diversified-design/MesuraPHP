<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Rontometer extends MetricLength
{
    protected static string $defaultSymbol = 'rm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
