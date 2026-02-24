<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareMillimeter extends MetricArea
{
    protected static string $defaultSymbol = 'mm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
