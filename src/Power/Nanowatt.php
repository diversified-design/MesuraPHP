<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Nanowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'nW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
