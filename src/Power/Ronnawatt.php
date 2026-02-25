<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Ronnawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'RW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
