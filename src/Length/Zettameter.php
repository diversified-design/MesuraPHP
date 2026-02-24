<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Zettameter extends MetricLength
{
    protected static string $defaultSymbol = 'Zm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
