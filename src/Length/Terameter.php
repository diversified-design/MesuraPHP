<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Terameter extends MetricLength
{
    protected static string $defaultSymbol = 'Tm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
