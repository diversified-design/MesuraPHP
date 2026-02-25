<?php

declare(strict_types=1);

namespace Mesura;

enum UnitSystem
{
    case SI;
    case Metric;
    case Imperial;
    case USCustomary;
    case Nautical;
    case Dimensionless;
    case Other;
}
