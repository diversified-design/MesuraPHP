<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Petaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Pl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
