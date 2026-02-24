<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Picometer extends MetricLength
{
    protected static string $defaultSymbol = 'pm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
