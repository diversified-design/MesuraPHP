<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Area\SquareMeter;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Volume\CubicMeter;
use MeasurementUnit\Weight\Kilogram;

// Custom formatter function
function formatUnit($unit): string
{
    return $unit->getValue() . ' ' . $unit->getInstanceSymbol();
}

echo 'COMPREHENSIVE MEASUREMENT UNIT EXAMPLES' . PHP_EOL;
echo '=====================================' . PHP_EOL;

// Part 1: Basic usage with custom symbols
echo PHP_EOL . 'PART 1: CUSTOM SYMBOLS' . PHP_EOL;
echo '------------------------' . PHP_EOL;

// Set custom global symbols
Meter::setSymbol('meter');
Foot::setSymbol('ft');
Kilogram::setSymbol('kilo');

// Create instances with default and custom symbols
$meter1 = new Meter(1);
$meter2 = new Meter(2);
$meter2->setInstanceSymbol('m');

echo 'Default symbol from class: ' . Meter::getSymbol() . PHP_EOL;
echo 'First meter instance: ' . formatUnit($meter1) . PHP_EOL;
echo 'Second meter instance with custom symbol: ' . formatUnit($meter2) . PHP_EOL;

// Part 2: Conversions between units
echo PHP_EOL . 'PART 2: UNIT CONVERSIONS' . PHP_EOL;
echo '------------------------' . PHP_EOL;

$height      = new Meter(1.85);
$weight      = new Kilogram(75);
$temperature = new Celsius(22.5);

echo 'Height: ' . formatUnit($height) . PHP_EOL;
echo 'Height in feet: ' . formatUnit($height->toFoot()) . PHP_EOL;
echo 'Height in inches: ' . formatUnit($height->toFoot()->toInch()) . PHP_EOL;

echo 'Weight: ' . formatUnit($weight) . PHP_EOL;
echo 'Weight in pounds: ' . formatUnit($weight->toPound()) . PHP_EOL;

echo 'Temperature: ' . formatUnit($temperature) . PHP_EOL;
echo 'Temperature in Fahrenheit: ' . formatUnit($temperature->toFahrenheit()) . PHP_EOL;
echo 'Temperature in Kelvin: ' . formatUnit($temperature->toKelvin()) . PHP_EOL;

// Part 3: Fluent API for complex calculations
echo PHP_EOL . 'PART 3: FLUENT API & CALCULATIONS' . PHP_EOL;
echo '-------------------------------' . PHP_EOL;

// Calculate BMI = weight(kg) / height(m)²
$heightInMeters = $height->getValue();
$weightInKg     = $weight->getValue();
$bmi            = $weightInKg / ($heightInMeters * $heightInMeters);

echo 'BMI Calculation:' . PHP_EOL;
echo 'Height: ' . formatUnit($height) . PHP_EOL;
echo 'Weight: ' . formatUnit($weight) . PHP_EOL;
echo 'BMI: ' . round($bmi, 2) . PHP_EOL;

// Room volume calculation
$roomLength = new Meter(5);
$roomWidth  = new Meter(4);
$roomHeight = new Meter(3);

$floorArea  = new SquareMeter($roomLength->getValue() * $roomWidth->getValue());
$roomVolume = new CubicMeter($floorArea->getValue() * $roomHeight->getValue());

echo PHP_EOL . 'Room Measurements:' . PHP_EOL;
echo 'Length: ' . formatUnit($roomLength) . PHP_EOL;
echo 'Width: ' . formatUnit($roomWidth) . PHP_EOL;
echo 'Height: ' . formatUnit($roomHeight) . PHP_EOL;
echo 'Floor Area: ' . $floorArea->getValue() . ' m²' . PHP_EOL;
echo 'Volume: ' . $roomVolume->getValue() . ' m³' . PHP_EOL;

// Part 4: Complex conversion chain
echo PHP_EOL . 'PART 4: COMPLEX CONVERSION CHAIN' . PHP_EOL;
echo '---------------------------------' . PHP_EOL;

$originalHeight = new Meter(2);
echo 'Original: ' . formatUnit($originalHeight) . PHP_EOL;

$result = $originalHeight
    ->withValue(function ($v) {
        return $v * 1.5;
    }) // Scale by 1.5
    ->toCentimeter() // Convert to cm
    ->withValue(function ($v) {
        return $v + 10;
    }) // Add 10 cm
    ->toFoot() // Convert to feet
    ->withValue(function ($v) {
        return round($v, 2);
    }) // Round to 2 decimal places
    ->setInstanceSymbol('feet') // Custom symbol
;

echo 'After complex conversion chain: ' . formatUnit($result) . PHP_EOL;

// Part 5: Mixed unit expression
echo PHP_EOL . 'PART 5: MIXED UNIT EXPRESSION' . PHP_EOL;
echo '----------------------------' . PHP_EOL;

$personHeight          = new Meter(1.93);
$heightInFeetAndInches = $personHeight->toFoot();
$feet                  = floor($heightInFeetAndInches->getValue());
$inches                = round(($heightInFeetAndInches->getValue() - $feet) * 12);

echo 'Height in meters: ' . formatUnit($personHeight) . PHP_EOL;
echo "Height in feet and inches: {$feet} ft {$inches} in" . PHP_EOL;

echo PHP_EOL . 'End of comprehensive examples.' . PHP_EOL;
