<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Zettawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'ZW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
