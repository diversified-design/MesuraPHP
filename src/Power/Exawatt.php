<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Exawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'EW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Exa;
    }
}
