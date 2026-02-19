<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Temperature\Celsius;

echo "Default symbols:" . PHP_EOL;
echo "Meter: " . Meter::getSymbol() . PHP_EOL;
echo "Kilometer: " . Kilometer::getSymbol() . PHP_EOL;
echo "Kilogram: " . Kilogram::getSymbol() . PHP_EOL;
echo "Celsius: " . Celsius::getSymbol() . PHP_EOL;

// Changing global/static symbols
echo PHP_EOL . "Changing static symbols globally:" . PHP_EOL;
Meter::setSymbol("m.");
Kilometer::setSymbol("km.");
Kilogram::setSymbol("kg.");
Celsius::setSymbol("°C");

echo "Meter: " . Meter::getSymbol() . PHP_EOL;
echo "Kilometer: " . Kilometer::getSymbol() . PHP_EOL;
echo "Kilogram: " . Kilogram::getSymbol() . PHP_EOL;
echo "Celsius: " . Celsius::getSymbol() . PHP_EOL;

// Instance symbol manipulation
echo PHP_EOL . "Instance symbol manipulation:" . PHP_EOL;
$meter = new Meter(1);
$kilometer = new Kilometer(1);
$kilogram = new Kilogram(1);
$celsius = new Celsius(1);

echo "Default instance symbols:" . PHP_EOL;
echo "Meter: " . $meter->getInstanceSymbol() . PHP_EOL;
echo "Kilometer: " . $kilometer->getInstanceSymbol() . PHP_EOL;
echo "Kilogram: " . $kilogram->getInstanceSymbol() . PHP_EOL;
echo "Celsius: " . $celsius->getInstanceSymbol() . PHP_EOL;

// Changing instance symbols
echo PHP_EOL . "After changing instance symbols:" . PHP_EOL;
$meter->setInstanceSymbol("meter");
$kilometer->setInstanceSymbol("kilometer");
$kilogram->setInstanceSymbol("kilogram");
$celsius->setInstanceSymbol("celsius");

echo "Meter: " . $meter->getInstanceSymbol() . PHP_EOL;
echo "Kilometer: " . $kilometer->getInstanceSymbol() . PHP_EOL;
echo "Kilogram: " . $kilogram->getInstanceSymbol() . PHP_EOL;
echo "Celsius: " . $celsius->getInstanceSymbol() . PHP_EOL;

// Demonstrating that static changes don't affect existing instances
echo PHP_EOL . "After another global symbol change:" . PHP_EOL;
Meter::setSymbol("meter(s)");
Kilometer::setSymbol("kilometer(s)");
echo "Global Meter symbol: " . Meter::getSymbol() . PHP_EOL;
echo "Existing meter instance symbol: " . $meter->getInstanceSymbol() . PHP_EOL;
echo "New meter instance symbol: " . (new Meter(2))->getInstanceSymbol() . PHP_EOL;
