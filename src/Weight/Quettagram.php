<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Quettagram extends MetricWeight
{
    protected static string $defaultSymbol = 'Qg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quetta;
    }
}
