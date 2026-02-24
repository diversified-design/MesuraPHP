<?php

declare(strict_types=1);

namespace Mesura\Length;

use Mesura\MetricPrefix;

class Megameter extends MetricLength
{
    protected static string $defaultSymbol = 'Mm';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Mega;
    }
}
