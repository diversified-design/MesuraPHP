<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareDecameter extends MetricArea
{
    protected static string $defaultSymbol = 'dam²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
