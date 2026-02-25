<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\Percentage\PartsPerBillion;
use Mesura\Percentage\PartsPerMillion;
use Mesura\Percentage\Percent;

// Percentage, ppm, and ppb all share a common ratio base
echo 'Percentage / PPM / PPB' . PHP_EOL;
echo '======================' . PHP_EOL . PHP_EOL;

$humidity = new Percent(75.0);
echo "Humidity: {$humidity}" . PHP_EOL;
echo "  as decimal ratio: {$humidity->toDecimal()}" . PHP_EOL;
echo "  as coefficient: {$humidity->toCoefficient()}" . PHP_EOL;
echo "  as ppm: {$humidity->toPartsPerMillion()}" . PHP_EOL;
echo "  as ppb: {$humidity->toPartsPerBillion()}" . PHP_EOL;

echo PHP_EOL;

// CO2 concentration in atmosphere (~420 ppm)
$co2 = new PartsPerMillion(420.0);
echo "Atmospheric CO2: {$co2}" . PHP_EOL;
echo "  as percent: {$co2->toPercent()}" . PHP_EOL;
echo "  as ppb: {$co2->toPartsPerBillion()}" . PHP_EOL;

echo PHP_EOL;

// Trace contaminant (5 ppb)
$contaminant = new PartsPerBillion(5.0);
echo "Trace contaminant: {$contaminant}" . PHP_EOL;
echo "  as ppm: {$contaminant->toPartsPerMillion()}" . PHP_EOL;
echo "  as percent: {$contaminant->toPercent()}" . PHP_EOL;
