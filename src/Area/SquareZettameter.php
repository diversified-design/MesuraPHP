<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareZettameter extends MetricArea
{
    protected static string $defaultSymbol = 'Zm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
