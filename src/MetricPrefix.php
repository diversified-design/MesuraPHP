<?php

declare(strict_types=1);

namespace MeasurementUnit;

enum MetricPrefix: int
{
    case Quetta = 30;
    case Ronna  = 27;
    case Yotta  = 24;
    case Zetta  = 21;
    case Exa    = 18;
    case Peta   = 15;
    case Tera   = 12;
    case Giga   = 9;
    case Mega   = 6;
    case Kilo   = 3;
    case Hecto  = 2;
    case Deca   = 1;
    case Deci   = -1;
    case Centi  = -2;
    case Milli  = -3;
    case Micro  = -6;
    case Nano   = -9;
    case Pico   = -12;
    case Femto  = -15;
    case Atto   = -18;
    case Zepto  = -21;
    case Yocto  = -24;
    case Ronto  = -27;
    case Quecto = -30;

    public function symbol(): string
    {
        return match ($this) {
            self::Quetta => 'Q',
            self::Ronna  => 'R',
            self::Yotta  => 'Y',
            self::Zetta  => 'Z',
            self::Exa    => 'E',
            self::Peta   => 'P',
            self::Tera   => 'T',
            self::Giga   => 'G',
            self::Mega   => 'M',
            self::Kilo   => 'k',
            self::Hecto  => 'h',
            self::Deca   => 'da',
            self::Deci   => 'd',
            self::Centi  => 'c',
            self::Milli  => 'm',
            self::Micro  => 'μ',
            self::Nano   => 'n',
            self::Pico   => 'p',
            self::Femto  => 'f',
            self::Atto   => 'a',
            self::Zepto  => 'z',
            self::Yocto  => 'y',
            self::Ronto  => 'r',
            self::Quecto => 'q',
        };
    }

    public function prefixName(): string
    {
        return mb_strtolower($this->name);
    }
}
