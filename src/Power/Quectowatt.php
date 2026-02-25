<?php

declare(strict_types=1);

namespace Mesura\Power;

use Mesura\MetricPrefix;

class Quectowatt extends MetricWatt
{
    protected static string $defaultSymbol = 'qW';

    protected static function prefix(): MetricPrefix
    {
        return MetricPrefix::Quecto;
    }
}
