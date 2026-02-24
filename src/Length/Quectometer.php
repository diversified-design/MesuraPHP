<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Quectometer extends MetricLength
{
    protected static string $defaultSymbol = 'qm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
