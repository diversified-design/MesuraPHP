<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Hectometer extends MetricLength
{
    protected static string $defaultSymbol = 'hm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
