<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Yoctoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'yl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
