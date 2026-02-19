<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\Pound;
use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;
use MeasurementUnit\Temperature\Kelvin;

// Example 1: Converting between multiple length units
echo "Example 1: Multiple length conversions" . PHP_EOL;
$length = new Meter(5);
$result = $length
    ->toCentimeter() // 5m = 500cm
    ->withValue(function ($value) { return $value / 2; }) // 500cm / 2 = 250cm
    ->toInch() // 250cm in inches
    ->toFoot() // Convert to feet
    ->withValue(function ($value) { return round($value, 2); }); // Round to 2 decimal places

echo "5 meters converted to cm, halved, converted to inches, then to feet: {$result->getValue()} {$result->getInstanceSymbol()}" . PHP_EOL;

// Example 2: Temperature conversion chain
echo PHP_EOL . "Example 2: Temperature conversion chain" . PHP_EOL;
$temperature = new Celsius(20);
$result = $temperature
    ->toFahrenheit() // 20°C to °F
    ->withValue(function ($value) { return $value + 10; }) // Add 10°F
    ->toKelvin() // Convert to Kelvin
    ->toCelsius(); // Back to Celsius

echo "20°C → °F → +10°F → K → °C = {$result->getValue()}°C" . PHP_EOL;

// Example 3: Weight conversions
echo PHP_EOL . "Example 3: Weight conversion chain" . PHP_EOL;
$weight = new Kilogram(10);
$result = $weight
    ->toPound() // 10kg to pounds
    ->withValue(function ($value) { return $value * 2; }) // Double the pounds
    ->toKilogram() // Convert back to kg
    ->withValue(function ($value) { return round($value, 2); }); // Round to 2 decimal places

echo "10kg → lb → doubled → kg = {$result->getValue()} {$result->getInstanceSymbol()}" . PHP_EOL;

// Example 4: Complex conversion with custom symbols
echo PHP_EOL . "Example 4: Complex conversion with custom symbols" . PHP_EOL;
$height = new Meter(1.8);
$result = $height
    ->withValue(function ($value) { return $value * 2; }) // Double the value
    ->toFoot() // Convert to feet
    ->toInch() // Convert to inches
    ->setInstanceSymbol("in"); // Custom symbol

echo "1.8m doubled and converted to inches: {$result->getValue()} {$result->getInstanceSymbol()}" . PHP_EOL;

// Example 5: Combining multiple unit types in sequence
echo PHP_EOL . "Example 5: Multiple unit conversions in sequence" . PHP_EOL;
// First, convert length
$lengthUnit = new Centimeter(30);
$lengthResult = $lengthUnit->toInch();
echo "30cm = {$lengthResult->getValue()} inches" . PHP_EOL;

// Then, convert weight
$weightUnit = new Pound(5);
$weightResult = $weightUnit->toKilogram();
echo "5lb = {$weightResult->getValue()} kg" . PHP_EOL;

// Finally, convert temperature
$tempUnit = new Fahrenheit(98.6);
$tempResult = $tempUnit->toCelsius();
echo "98.6°F = {$tempResult->getValue()}°C" . PHP_EOL;
