<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Petameter extends MetricLength
{
    protected static string $defaultSymbol = 'Pm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
