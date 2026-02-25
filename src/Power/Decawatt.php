<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Decawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'daW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deca;
    }
}
