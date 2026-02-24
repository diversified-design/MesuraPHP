# Measurement-unit


## Setup

> **Note**
> Make sure you are running PHP 8.1 or higher to use this package

To use this package in your project, run the following command:

```shell
composer require diversified-design/measurement-unit
```

## Available Units

| Type        | Available unit                                                                                                    |
|-------------|-------------------------------------------------------------------------------------------------------------------|
| **Angle**       | Degree, Radian |
| **Length**      | Centimeter, Fathom, Foot, Furlong, HorseLength, Inch, Kilometer, Meter, Millimeter, NauticalMile, StatuteMile, SurveyMile, Thou, Yard     |
| **Percentage**  | Percent ( *as value between 0-100, as decimal between 0-1, to coefficent* )
| **Pressure**    | Bar, Hectopascal, Kilopascal, Millibar, MillimetreOfMercury, Pascal, PoundPerSquareInch, StandardAtmosphere, Torr | 
| **Speed**       | KilometerPerHour, Knot, MeterPerSecond, MilesPerHour                                                              |
| **Temperature** | Celsius, Fahrenheit, Kelvin, Rankine                                                                              |
| **Time**        | Day, Hour, Minute, Second                                                                                         |
| **Torque**      | NewtonMeter                                                                                                       |
| **Volume**      | CubicInch, CubicMeter, CubicYard, FluidDram, FluidOunce, Liter, Pint, Quart, TableSpoon                           |
| **Weight**      | Kilogram, MetricTon, Pound                                                                                        |

All the units of a type can be converted to each other with corresponding methods.

## Available Methods on all Units

### ->getValue()

### ->getInstanceSymbol()

### ->setInstanceSymbol()

### ::getSymbol()

### ::setSymbol()

### ->toHtml($sprintfTemplate)

### ->toFormat($sprintfTemplate)

## Usage



