<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Centimeter;
use MeasurementUnit\Length\Foot;
use MeasurementUnit\Length\Inch;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Mile;
use MeasurementUnit\Length\Millimeter;
use MeasurementUnit\Length\Yard;

// Create instances of different length units
$meter = new Meter(1);
$cm    = new Centimeter(1);
$mm    = new Millimeter(1);
$km    = new Kilometer(1);
$inch  = new Inch(1);
$foot  = new Foot(1);
$yard  = new Yard(1);
$mile  = new Mile(1);

// Display their values and symbols
echo "1 meter = {$meter->getValue()} {$meter->getInstanceSymbol()}" . PHP_EOL;
echo "1 centimeter = {$cm->getValue()} {$cm->getInstanceSymbol()}" . PHP_EOL;
echo "1 millimeter = {$mm->getValue()} {$mm->getInstanceSymbol()}" . PHP_EOL;
echo "1 kilometer = {$km->getValue()} {$km->getInstanceSymbol()}" . PHP_EOL;
echo "1 inch = {$inch->getValue()} {$inch->getInstanceSymbol()}" . PHP_EOL;
echo "1 foot = {$foot->getValue()} {$foot->getInstanceSymbol()}" . PHP_EOL;
echo "1 yard = {$yard->getValue()} {$yard->getInstanceSymbol()}" . PHP_EOL;
echo "1 mile = {$mile->getValue()} {$mile->getInstanceSymbol()}" . PHP_EOL;

// Conversions between units
echo 'Converting between units:' . PHP_EOL;
echo '1 meter = ' . $meter->toCentimeter()->getValue() . ' centimeters' . PHP_EOL;
echo '1 meter = ' . $meter->toMillimeter()->getValue() . ' millimeters' . PHP_EOL;
echo '1 kilometer = ' . $km->toMeter()->getValue() . ' meters' . PHP_EOL;
echo '1 foot = ' . $foot->toInch()->getValue() . ' inches' . PHP_EOL;
echo '1 yard = ' . $yard->toFoot()->getValue() . ' feet' . PHP_EOL;
echo '1 mile = ' . $mile->toYard()->getValue() . ' yards' . PHP_EOL;

// Metric to imperial conversions
echo '100 cm = ' . $cm->withValue(100)->toInch()->getValue() . ' inches' . PHP_EOL;
echo '1 mile = ' . $mile->toKilometer()->getValue() . ' kilometers' . PHP_EOL;
