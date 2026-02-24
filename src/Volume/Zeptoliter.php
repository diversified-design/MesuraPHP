<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Zeptoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'zl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
