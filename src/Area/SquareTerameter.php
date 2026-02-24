<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareTerameter extends MetricArea
{
    protected static string $defaultSymbol = 'Tm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
