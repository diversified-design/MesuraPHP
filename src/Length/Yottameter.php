<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Yottameter extends MetricLength
{
    protected static string $defaultSymbol = 'Ym';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yotta;
    }
}
