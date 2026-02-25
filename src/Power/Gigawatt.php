<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Gigawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'GW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
