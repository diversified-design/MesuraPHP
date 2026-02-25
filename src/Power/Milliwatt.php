<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Milliwatt extends MetricWatt
{
    protected static string $defaultSymbol = 'mW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Milli;
    }
}
