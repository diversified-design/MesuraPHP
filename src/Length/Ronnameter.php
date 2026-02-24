<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Ronnameter extends MetricLength
{
    protected static string $defaultSymbol = 'Rm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
