<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Terawatt extends MetricWatt
{
    protected static string $defaultSymbol = 'TW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Tera;
    }
}
