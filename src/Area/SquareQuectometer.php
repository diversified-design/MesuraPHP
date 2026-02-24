<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareQuectometer extends MetricArea
{
    protected static string $defaultSymbol = 'qm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
