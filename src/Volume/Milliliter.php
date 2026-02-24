<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Milliliter extends MetricLiter
{
    protected static string $defaultSymbol = 'ml';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
