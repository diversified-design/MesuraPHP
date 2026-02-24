<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Kiloliter extends MetricLiter
{
    protected static string $defaultSymbol = 'kl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Kilo;
    }
}
