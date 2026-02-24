<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Nanogram extends MetricWeight
{
    protected static string $defaultSymbol = 'ng';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
