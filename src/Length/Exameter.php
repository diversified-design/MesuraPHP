<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Exameter extends MetricLength
{
    protected static string $defaultSymbol = 'Em';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
