<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Rontoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'rl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
