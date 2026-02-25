<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Megawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'MW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
