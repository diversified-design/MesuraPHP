<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Weight\Gram;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\Milligram;
use MeasurementUnit\Weight\Pound;
use MeasurementUnit\Weight\Ounce;
use MeasurementUnit\Weight\Stone;
use MeasurementUnit\Weight\Ton;

// Create instances of different weight units
$gram = new Gram(1);
$kg = new Kilogram(1);
$mg = new Milligram(1);
$pound = new Pound(1);
$ounce = new Ounce(1);
$stone = new Stone(1);
$ton = new Ton(1);

// Display values and symbols
echo "1 gram = {$gram->getValue()} {$gram->getInstanceSymbol()}" . PHP_EOL;
echo "1 kilogram = {$kg->getValue()} {$kg->getInstanceSymbol()}" . PHP_EOL;
echo "1 milligram = {$mg->getValue()} {$mg->getInstanceSymbol()}" . PHP_EOL;
echo "1 pound = {$pound->getValue()} {$pound->getInstanceSymbol()}" . PHP_EOL;
echo "1 ounce = {$ounce->getValue()} {$ounce->getInstanceSymbol()}" . PHP_EOL;
echo "1 stone = {$stone->getValue()} {$stone->getInstanceSymbol()}" . PHP_EOL;
echo "1 ton = {$ton->getValue()} {$ton->getInstanceSymbol()}" . PHP_EOL;

// Conversions between units
echo PHP_EOL . "Converting between weight units:" . PHP_EOL;
echo "1 kilogram = " . $kg->toGram()->getValue() . " grams" . PHP_EOL;
echo "1 pound = " . $pound->toOunce()->getValue() . " ounces" . PHP_EOL;
echo "1 stone = " . $stone->toPound()->getValue() . " pounds" . PHP_EOL;
echo "1 ton = " . $ton->toKilogram()->getValue() . " kilograms" . PHP_EOL;

// Metric to imperial conversions
echo "500 grams = " . $gram->withValue(500)->toPound()->getValue() . " pounds" . PHP_EOL;
echo "10 kilograms = " . $kg->withValue(10)->toStone()->getValue() . " stones" . PHP_EOL;
