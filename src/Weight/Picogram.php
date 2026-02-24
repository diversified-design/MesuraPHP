<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Picogram extends MetricWeight
{
    protected static string $defaultSymbol = 'pg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
