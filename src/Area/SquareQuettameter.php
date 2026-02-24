<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareQuettameter extends MetricArea
{
    protected static string $defaultSymbol = 'Qm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
