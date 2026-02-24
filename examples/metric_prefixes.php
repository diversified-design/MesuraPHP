<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Area\SquareCentimeter;
use MeasurementUnit\Area\SquareKilometer;
use MeasurementUnit\Area\SquareMeter;
use MeasurementUnit\Area\SquareMillimeter;
use MeasurementUnit\Length\Gigameter;
use MeasurementUnit\Length\Kilometer;
use MeasurementUnit\Length\Megameter;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Length\Micrometer;
use MeasurementUnit\Length\Nanometer;
use MeasurementUnit\Length\Picometer;
use MeasurementUnit\Length\Yottameter;
use MeasurementUnit\Volume\Centiliter;
use MeasurementUnit\Volume\Deciliter;
use MeasurementUnit\Volume\Kiloliter;
use MeasurementUnit\Volume\Liter;
use MeasurementUnit\Volume\Milliliter;
use MeasurementUnit\Weight\Gram;
use MeasurementUnit\Weight\Kilogram;
use MeasurementUnit\Weight\Megagram;
use MeasurementUnit\Weight\Microgram;
use MeasurementUnit\Weight\Milligram;
use MeasurementUnit\Weight\Nanogram;

echo 'METRIC PREFIX EXAMPLES' . PHP_EOL;
echo '======================' . PHP_EOL;

// Part 1: Length — the full spectrum
echo PHP_EOL . 'PART 1: LENGTH ACROSS THE METRIC SPECTRUM' . PHP_EOL;
echo '------------------------------------------' . PHP_EOL;

$oneKm = new Kilometer(1);
echo '1 kilometer = ' . $oneKm->toMeter()->getValue() . ' meters' . PHP_EOL;
echo '1 kilometer = ' . $oneKm->toMillimeter()->getValue() . ' millimeters' . PHP_EOL;
echo '1 kilometer = ' . $oneKm->toMicrometer()->getValue() . ' micrometers' . PHP_EOL;
echo '1 kilometer = ' . $oneKm->toNanometer()->getValue() . ' nanometers' . PHP_EOL;

// Astronomical scale: using toUnit() for uncommon prefixes
$distanceToSun = new Megameter(149598);
echo PHP_EOL . 'Distance to the Sun: ' . $distanceToSun->getValue() . ' ' . $distanceToSun->getInstanceSymbol() . PHP_EOL;
echo 'In kilometers: ' . $distanceToSun->toKilometer()->getValue() . ' km' . PHP_EOL;
echo 'In gigameters: ' . $distanceToSun->toUnit(Gigameter::class)->getValue() . ' Gm' . PHP_EOL;

// Subatomic scale
$atomRadius = new Picometer(53);
echo PHP_EOL . 'Hydrogen atom radius: ' . $atomRadius->getValue() . ' ' . $atomRadius->getInstanceSymbol() . PHP_EOL;
echo 'In nanometers: ' . $atomRadius->toNanometer()->getValue() . ' nm' . PHP_EOL;
echo 'In meters: ' . $atomRadius->toMeter()->getValue() . ' m' . PHP_EOL;

// Using toUnit() for rare prefixes
echo PHP_EOL . 'Observable universe: ~' . (new Yottameter(0.88))->toMeter()->getValue() . ' meters' . PHP_EOL;

// Part 2: Weight — common metric conversions
echo PHP_EOL . 'PART 2: WEIGHT — EVERYDAY TO SCIENTIFIC' . PHP_EOL;
echo '-----------------------------------------' . PHP_EOL;

$bodyWeight = new Kilogram(75);
echo 'Body weight: ' . $bodyWeight->getValue() . ' kg' . PHP_EOL;
echo 'In grams: ' . $bodyWeight->toGram()->getValue() . ' g' . PHP_EOL;
echo 'In megagrams (metric tonnes): ' . $bodyWeight->toMegagram()->getValue() . ' Mg' . PHP_EOL;

$dose = new Milligram(500);
echo PHP_EOL . 'Medicine dose: ' . $dose->getValue() . ' ' . $dose->getInstanceSymbol() . PHP_EOL;
echo 'In grams: ' . $dose->toGram()->getValue() . ' g' . PHP_EOL;
echo 'In micrograms: ' . $dose->toMicrogram()->getValue() . ' μg' . PHP_EOL;

$dnaWeight = new Nanogram(0.003);
echo PHP_EOL . 'DNA sample: ' . $dnaWeight->getValue() . ' ' . $dnaWeight->getInstanceSymbol() . PHP_EOL;
echo 'In micrograms: ' . $dnaWeight->toMicrogram()->getValue() . ' μg' . PHP_EOL;

// Part 3: Volume — liters across scales
echo PHP_EOL . 'PART 3: VOLUME — LITERS AT EVERY SCALE' . PHP_EOL;
echo '----------------------------------------' . PHP_EOL;

$pool = new Kiloliter(50);
echo 'Swimming pool: ' . $pool->getValue() . ' ' . $pool->getInstanceSymbol() . PHP_EOL;
echo 'In liters: ' . $pool->toLiter()->getValue() . ' l' . PHP_EOL;

$bottle = new Liter(0.75);
echo PHP_EOL . 'Wine bottle: ' . $bottle->getValue() . ' l' . PHP_EOL;
echo 'In centiliters: ' . $bottle->toCentiliter()->getValue() . ' cl' . PHP_EOL;
echo 'In deciliters: ' . $bottle->toDeciliter()->getValue() . ' dl' . PHP_EOL;
echo 'In milliliters: ' . $bottle->toMilliliter()->getValue() . ' ml' . PHP_EOL;

$syringe = new Milliliter(5);
echo PHP_EOL . 'Syringe: ' . $syringe->getValue() . ' ml' . PHP_EOL;
echo 'In cubic meters: ' . $syringe->toCubicMeter()->getValue() . ' m³' . PHP_EOL;

// Part 4: Area — squared prefixes compound
echo PHP_EOL . 'PART 4: AREA — PREFIXES SQUARED' . PHP_EOL;
echo '--------------------------------' . PHP_EOL;

echo 'Note: area prefixes are squared, so 1 km² = 1,000,000 m² (not 1,000)' . PHP_EOL;

$cityArea = new SquareKilometer(105.4);
echo PHP_EOL . 'Paris area: ' . $cityArea->getValue() . ' ' . $cityArea->getInstanceSymbol() . PHP_EOL;
echo 'In square meters: ' . $cityArea->toSquareMeter()->getValue() . ' m²' . PHP_EOL;

$stamp = new SquareCentimeter(6.27);
echo PHP_EOL . 'Postage stamp: ' . $stamp->getValue() . ' ' . $stamp->getInstanceSymbol() . PHP_EOL;
echo 'In square millimeters: ' . $stamp->toSquareMillimeter()->getValue() . ' mm²' . PHP_EOL;
echo 'In square meters: ' . $stamp->toSquareMeter()->getValue() . ' m²' . PHP_EOL;

// Part 5: Cross-scale conversions with toUnit()
echo PHP_EOL . 'PART 5: USING toUnit() FOR ANY PREFIX' . PHP_EOL;
echo '--------------------------------------' . PHP_EOL;

echo 'Any metric prefix is available via toUnit():' . PHP_EOL;
$oneMeter = new Meter(1);
echo '1 meter = ' . $oneMeter->toUnit(Micrometer::class)->getValue() . ' μm' . PHP_EOL;
echo '1 meter = ' . $oneMeter->toUnit(Nanometer::class)->getValue() . ' nm' . PHP_EOL;
echo '1 meter = ' . $oneMeter->toUnit(Picometer::class)->getValue() . ' pm' . PHP_EOL;

echo PHP_EOL . 'End of metric prefix examples.' . PHP_EOL;
