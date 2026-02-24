<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareHectometer extends MetricArea
{
    protected static string $defaultSymbol = 'hm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
