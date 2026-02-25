<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Microwatt extends MetricWatt
{
    protected static string $defaultSymbol = 'μW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Micro;
    }
}
