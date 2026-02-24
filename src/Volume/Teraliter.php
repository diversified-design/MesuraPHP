<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Teraliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Tl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
