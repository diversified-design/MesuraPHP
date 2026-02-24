<?php

declare(strict_types=1);

namespace Mesura\Area;

use Mesura\MetricPrefix;

class SquarePetameter extends MetricArea
{
    protected static string $defaultSymbol = 'Pm²';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
