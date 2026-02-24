<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareMicrometer extends MetricArea
{
    protected static string $defaultSymbol = 'μm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
