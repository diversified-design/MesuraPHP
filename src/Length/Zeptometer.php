<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Zeptometer extends MetricLength
{
    protected static string $defaultSymbol = 'zm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
