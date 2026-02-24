<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Exaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'El';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
