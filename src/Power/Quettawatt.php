<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Quettawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'QW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
