<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Gigagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Gg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
