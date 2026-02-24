<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Deciliter extends MetricLiter
{
    protected static string $defaultSymbol = 'dl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
