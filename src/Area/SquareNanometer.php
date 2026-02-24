<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareNanometer extends MetricArea
{
    protected static string $defaultSymbol = 'nm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
