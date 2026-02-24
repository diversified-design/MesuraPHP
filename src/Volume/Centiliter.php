<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Centiliter extends MetricLiter
{
    protected static string $defaultSymbol = 'cl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
