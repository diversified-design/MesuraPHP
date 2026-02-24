<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Yoctometer extends MetricLength
{
    protected static string $defaultSymbol = 'ym';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
