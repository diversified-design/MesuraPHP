<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Centiwatt extends MetricWatt
{
    protected static string $defaultSymbol = 'cW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Centi;
    }
}
