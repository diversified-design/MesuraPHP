<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Yoctojoule extends MetricJoule
{
    protected static string $defaultSymbol = 'yJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Yocto;
    }
}
