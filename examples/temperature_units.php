<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;
use MeasurementUnit\Temperature\Kelvin;

// Create instances of different temperature units
$celsius    = new Celsius(25);
$fahrenheit = new Fahrenheit(77);
$kelvin     = new Kelvin(298.15);

// Display values and symbols
echo 'Room temperature in different units:' . PHP_EOL;
echo "Celsius: {$celsius->getValue()} {$celsius->getInstanceSymbol()}" . PHP_EOL;
echo "Fahrenheit: {$fahrenheit->getValue()} {$fahrenheit->getInstanceSymbol()}" . PHP_EOL;
echo "Kelvin: {$kelvin->getValue()} {$kelvin->getInstanceSymbol()}" . PHP_EOL;

// Temperature conversions
echo PHP_EOL . 'Converting between temperature units:' . PHP_EOL;
echo '0 °C = ' . (new Celsius(0))->toFahrenheit()->getValue() . ' °F' . PHP_EOL;
echo '32 °F = ' . (new Fahrenheit(32))->toCelsius()->getValue() . ' °C' . PHP_EOL;
echo '100 °C = ' . (new Celsius(100))->toKelvin()->getValue() . ' K' . PHP_EOL;
echo '373.15 K = ' . (new Kelvin(373.15))->toCelsius()->getValue() . ' °C' . PHP_EOL;

// Boiling and freezing points
$freezing = new Celsius(0);
$boiling  = new Celsius(100);

echo PHP_EOL . 'Water freezing and boiling points:' . PHP_EOL;
echo "Water freezes at: {$freezing->getValue()} °C / {$freezing->toFahrenheit()->getValue()} °F / {$freezing->toKelvin()->getValue()} K" . PHP_EOL;
echo "Water boils at: {$boiling->getValue()} {$boiling->getInstanceSymbol()}°C / {$boiling->toFahrenheit()->getValue()}{$boiling->toFahrenheit()->getInstanceSymbol()} °F / {$boiling->toKelvin()->getValue()}{$boiling->toKelvin()->getInstanceSymbol()} K" . PHP_EOL;

echo PHP_EOL . 'Using __toString() method for display:' . PHP_EOL;
echo "Water boils at: {$boiling} / {$boiling->toFahrenheit()} / {$boiling->toKelvin()}" . PHP_EOL;

echo PHP_EOL . 'Using __get() method for display:' . PHP_EOL;
echo "Room temperature in Celsius: {$celsius->value} {$celsius->getInstanceSymbol()}" . PHP_EOL;
echo "Room temperature in Fahrenheit: {$fahrenheit->value} {$fahrenheit->getInstanceSymbol()}" . PHP_EOL;
echo "Room temperature in Kelvin: {$kelvin->value} {$kelvin->getInstanceSymbol()}" . PHP_EOL;

echo "{$kelvin->value} - " . gettype($kelvin->value) . PHP_EOL;
echo "{$kelvin} - " . gettype((string) $kelvin) . PHP_EOL;
