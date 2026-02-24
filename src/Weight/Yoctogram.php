<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Yoctogram extends MetricWeight
{
    protected static string $defaultSymbol = 'yg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
