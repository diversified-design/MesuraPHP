<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareRonnameter extends MetricArea
{
    protected static string $defaultSymbol = 'Rm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
