<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareKilometer extends MetricArea
{
    protected static string $defaultSymbol = 'km²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
