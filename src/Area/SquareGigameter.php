<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareGigameter extends MetricArea
{
    protected static string $defaultSymbol = 'Gm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
