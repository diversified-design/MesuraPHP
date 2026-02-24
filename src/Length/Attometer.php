<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Attometer extends MetricLength
{
    protected static string $defaultSymbol = 'am';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Atto;
    }
}
