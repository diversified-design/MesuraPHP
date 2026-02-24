<?php

declare(strict_types=1);

namespace Mesura\Volume;

use Mesura\MetricPrefix;

class Zettaliter extends MetricLiter
{
    protected static string $defaultSymbol = 'Zl';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Zetta;
    }
}
