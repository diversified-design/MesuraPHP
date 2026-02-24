<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Teragram extends MetricWeight
{
    protected static string $defaultSymbol = 'Tg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
