<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareMegameter extends MetricArea
{
    protected static string $defaultSymbol = 'Mm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
