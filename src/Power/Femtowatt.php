<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Femtowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'fW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Femto;
    }
}
