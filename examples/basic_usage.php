<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Weight\Kilogram;

// Creating measurement units
$meter = new Meter(1.0);
$centimeter = new Centimeter(100.0);
$kilogram = new Kilogram(5.0);

// Getting values
echo "Value in meter: " . $meter->getValue() . PHP_EOL;
echo "Value in centimeter: " . $centimeter->getValue() . PHP_EOL;
echo "Value in kilogram: " . $kilogram->getValue() . PHP_EOL;

// Getting symbols
echo "Meter symbol: " . $meter->getInstanceSymbol() . PHP_EOL;
echo "Centimeter symbol: " . $centimeter->getInstanceSymbol() . PHP_EOL;
echo "Kilogram symbol: " . $kilogram->getInstanceSymbol() . PHP_EOL;

// Converting between units
$meterFromCm = $centimeter->toMeter();
echo "100 centimeters = " . $meterFromCm->getValue() . " meters" . PHP_EOL;

// Output with __toString()
echo "Representation of meter: " . $meter . PHP_EOL;
echo "Representation of centimeter: " . $centimeter . PHP_EOL;
echo "Representation of kilogram: " . $kilogram . PHP_EOL;
