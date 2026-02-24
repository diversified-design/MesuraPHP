<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Decameter extends MetricLength
{
    protected static string $defaultSymbol = 'dam';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
