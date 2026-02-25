<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Yoctowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'yW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
