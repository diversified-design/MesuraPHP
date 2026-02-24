<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Gigameter extends MetricLength
{
    protected static string $defaultSymbol = 'Gm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Giga;
    }
}
