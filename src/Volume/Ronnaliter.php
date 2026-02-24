<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Ronnaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Rl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronna;
    }
}
