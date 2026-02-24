# Measurement-unit


## Setup

> **Note**
> Make sure you are running PHP 8.1 or higher to use this package

To use this package in your project, run the following command:

```shell
composer require diversified-design/measurement-unit
```

## Available Units

| Domain          | Available unit                                                                                                    |
|-----------------|-------------------------------------------------------------------------------------------------------------------|
| **Angle**       | **Degree**, Radian                                                                                                    |
| **Area**        | Acre, Hectare, SquareFoot, SquareKilometer, **SquareMeter**, SqaureMile
| **Length**      | **Centimeter**, Fathom, Foot, Furlong, HorseLength, Inch, Kilometer, Meter, Millimeter, NauticalMile, StatuteMile, SurveyMile, Thou, Yard     |
| **Percentage**  | **Percent** ( *as value between 0-100, as decimal between 0-1, to coefficent* )
| **Pressure**    | Bar, Hectopascal, Kilopascal, Millibar, MillimetreOfMercury, **Pascal**, PoundPerSquareInch, StandardAtmosphere, Torr | 
| **Speed**       | KilometerPerHour, Knot, **MeterPerSecond**, MilesPerHour                                                              |
| **Temperature** | Celsius, Fahrenheit, **Kelvin**, Rankine                                                                              |
| **Time**        | Day, Hour, Minute, **Second**                                                                                         |
| **Torque**      | **NewtonMeter**                                                                                                       |
| **Volume**      | CubicInch, **CubicMeter**, CubicYard, FluidDram, FluidOunce, Liter, Pint, Quart, TableSpoon                           |
| **Weight**      | **Kilogram**, MetricTon, Pound                                                                                        |

All the units of a type can be converted to each other with corresponding methods.

---

## Available Methods on all Units

### ->getValue()

### ->getInstanceSymbol()

### ->setInstanceSymbol()

### ::getSymbol()

### ::setSymbol()

### ->withValue()

### ->toHtml($sprintfTemplate)

### ->toFormat($sprintfTemplate)

---

## Basic Usage

Set the value of the measurement unit directly
```php
$celsius = new Celsius(28);
# $celsius = (MeasurementUnit\Temperature\Celsius) 28
```

Convert to another unit in the same domain:

```php
$fahrenheit = $celsius->toFahrenheit();
# $fahrenheit = (MeasurementUnit\Temperature\Fahrenheit) 82.4
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

