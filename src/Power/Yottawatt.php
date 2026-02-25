<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Yottawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'YW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
