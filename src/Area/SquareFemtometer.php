<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquareFemtometer extends MetricArea
{
    protected static string $defaultSymbol = 'fm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
