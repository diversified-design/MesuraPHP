<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Microgram extends MetricWeight
{
    protected static string $defaultSymbol = 'μg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
