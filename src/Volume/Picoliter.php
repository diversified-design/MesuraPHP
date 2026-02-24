<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Picoliter extends MetricLiter
{
    protected static string $defaultSymbol = 'pl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Pico;
    }
}
