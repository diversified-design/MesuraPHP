<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Megaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Ml';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
