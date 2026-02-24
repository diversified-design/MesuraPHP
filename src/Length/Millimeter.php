<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Millimeter extends MetricLength
{
    protected static string $defaultSymbol = 'mm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
