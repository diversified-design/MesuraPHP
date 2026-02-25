<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Zeptowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'zW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zepto;
    }
}
