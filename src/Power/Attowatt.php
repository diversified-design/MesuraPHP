<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Attowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'aW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Atto;
    }
}
