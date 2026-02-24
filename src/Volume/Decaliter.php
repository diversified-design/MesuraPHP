<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Decaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'dal';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
