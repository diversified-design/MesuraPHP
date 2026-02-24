<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Centimeter extends MetricLength
{
    protected static string $defaultSymbol = 'cm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
