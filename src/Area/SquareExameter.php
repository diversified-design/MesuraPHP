<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareExameter extends MetricArea
{
    protected static string $defaultSymbol = 'Em²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
