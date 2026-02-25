<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Deciwatt extends MetricWatt
{
    protected static string $defaultSymbol = 'dW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Deci;
    }
}
