<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Decimeter extends MetricLength
{
    protected static string $defaultSymbol = 'dm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
