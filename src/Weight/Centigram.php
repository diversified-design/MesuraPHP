<?php

declare(strict_types=1);

namespace Mesura\Weight;

use Mesura\MetricPrefix;

class Centigram extends MetricWeight
{
    protected static string $defaultSymbol = 'cg';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
