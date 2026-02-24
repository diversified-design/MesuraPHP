<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Quettameter extends MetricLength
{
    protected static string $defaultSymbol = 'Qm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
