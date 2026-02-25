<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Petawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'PW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Peta;
    }
}
