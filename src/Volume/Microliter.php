<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Microliter extends MetricLiter
{
    protected static string $defaultSymbol = 'μl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
