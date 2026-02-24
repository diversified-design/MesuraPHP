<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareRontometer extends MetricArea
{
    protected static string $defaultSymbol = 'rm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
