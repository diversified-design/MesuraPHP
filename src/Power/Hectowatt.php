<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Hectowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'hW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Hecto;
    }
}
