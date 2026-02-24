<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareDecimeter extends MetricArea
{
    protected static string $defaultSymbol = 'dm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
