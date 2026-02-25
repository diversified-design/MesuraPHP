<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Rontowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'rW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Ronto;
    }
}
