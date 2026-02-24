# MesuraPHP

A PHP library for representing, converting, and formatting physical measurements — from temperature and pressure to length, weight, and volume — with full SI metric prefix support and a fluent, type-safe API.  

## Installation

```shell
composer require diversified-design/mesura-php
```


## Available Units

| Domain          | Available unit                                                                                                    |
|-----------------|-------------------------------------------------------------------------------------------------------------------|
| **Angle**       | **Degree**, Radian                                                                                                |
| **Area**        | Acre, Hectare, SquareFoot, SquareKilometer, **SquareMeter**, SquareMile + all metric prefixes (see below) |
| **Length**      | **Centimeter**, Fathom, Foot, Furlong, HorseLength, Inch, Kilometer, Meter, Millimeter, NauticalMile, StatuteMile, SurveyMile, Thou, Yard + all metric prefixes (see below) |
| **Percentage**  | **Percent** ( *as value between 0-100, as decimal between 0-1, to coefficent* )                                       |
| **Pressure**    | Bar, Hectopascal, Kilopascal, Millibar, MillimetreOfMercury, **Pascal**, PoundPerSquareInch, StandardAtmosphere, Torr | 
| **Speed**       | KilometerPerHour, Knot, **MeterPerSecond**, MilesPerHour                                                              |
| **Temperature** | Celsius, Fahrenheit, **Kelvin**, Rankine                                                                              |
| **Time**        | Day, Hour, Minute, **Second**                                                                                         |
| **Torque**      | **NewtonMeter**                                                                                                       |
| **Volume**      | CubicInch, **CubicMeter**, CubicYard, FluidDram, FluidOunce, Liter, Pint, Quart, TableSpoon + all metric prefixes (see below) |
| **Weight**      | Gram, **Kilogram**, MetricTon, Pound + all metric prefixes (see below)                                                |

All the units of a domain can be converted to each other with corresponding methods.

### Full SI Metric Prefix Support

Length, Weight, Volume (liters), and Area (square meters) support all 24 SI metric prefixes — from Quetta (10^30) down to Quecto (10^-30). For example, Length includes Quettameter, Megameter, Kilometer, Centimeter, Nanometer, Quectometer, and everything in between. The same applies to the other metric dimensions (e.g. Milligram, Kiloliter, SquareCentimeter).

Common prefixed units have dedicated convenience methods (e.g. `->toNanometer()`, `->toMilligram()`). All others are accessible via `->toUnit(Yottameter::class)`.


---

## Basic Usage

Set the value of the measurement unit directly
```php
$celsius = new Celsius(28);
# $celsius = (Mesura\Temperature\Celsius) 28
```

Convert to another unit in the same domain:

```php
$fahrenheit = $celsius->toFahrenheit();
# $fahrenheit = (Mesura\Temperature\Fahrenheit) 82.4
```

**See many more examples in `./examples/fluent_conversions.php` & `./examples/complete_example.php`**


## Fluent Usage

The same example as above, but fluently

```php
$fahrenheit = (new Celsius(28))->toFahrenheit();
```

**See more examples in `./examples/fluent_conversions.php`**


## Formatting output

Formatting methods use [`sprintf()` ](https://www.php.net/manual/en/function.sprintf.php)

**See the examples in `./examples/formatting.php`**


## Setting Custom Symbols

All units have default symbols already assigned, but you can set custom ones per instance or per lifecycle.

**See the examples in `./examples/symbol_manipulation.php`**

You can also customize all units up-front in one go using the Customize class' `::unitSymbols()` static method.

**See the examples in `./examples/customize_units.php`**


---

# Credit Due

This codebase is a much expanded and heavily modified "hard" fork of the excellent [PrinsFrank/measurement-unit](https://github.com/PrinsFrank/measurement-unit).

It adds several utility methods, many more units across more domains, and relies on [Brick\Math](https://github.com/brick/math) for all conversions.


---

# LLMs, Coding Agents, etc…

Yes, this work relies heavily on such tools. It is however not "vibe coded" nor "one-shotted."

As an artisan, I use the tools available *as tools*: to help me make better things, and learn faster.

Did I write every line of code? No.
Do I understand every single part of it. No, but most of it.

I did (re)architect and (re)design it with my own knowledge, experience and needs, discussing with and instructing agents as I would have with a team of engineers. 

**Issues and Pull Requests from fellow humans are always welcome.**


---

I hope you find this library as useful and pleasurable to use as I do.