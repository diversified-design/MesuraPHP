<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquarePicometer extends MetricArea
{
    protected static string $defaultSymbol = 'pm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
