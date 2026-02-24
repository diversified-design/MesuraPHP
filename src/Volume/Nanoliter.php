<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Nanoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'nl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Nano;
    }
}
