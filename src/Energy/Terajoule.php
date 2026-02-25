<?php

declare(strict_types=1);

namespace Mesura\Energy;

use Mesura\MetricPrefix;

class Terajoule extends MetricJoule
{
    protected static string $defaultSymbol = 'TJ';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
