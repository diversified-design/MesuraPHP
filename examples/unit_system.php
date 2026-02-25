<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\Length\Foot;
use Mesura\Length\Kilometer;
use Mesura\Length\Meter;
use Mesura\Length\NauticalMile;
use Mesura\Percentage\Percent;
use Mesura\Temperature\Celsius;
use Mesura\Time\Minute;
use Mesura\UnitSystem;
use Mesura\Volume\ImperialPint;
use Mesura\Volume\Pint;

// Every unit class exposes its measurement system via unitSystem()
echo 'Unit System Classification' . PHP_EOL;
echo '=========================' . PHP_EOL . PHP_EOL;

echo 'Meter:        ' . Meter::unitSystem()->name . PHP_EOL;        // SI
echo 'Kilometer:    ' . Kilometer::unitSystem()->name . PHP_EOL;    // SI (via MetricLength)
echo 'Celsius:      ' . Celsius::unitSystem()->name . PHP_EOL;      // Metric
echo 'Foot:         ' . Foot::unitSystem()->name . PHP_EOL;         // Imperial
echo 'Pint (US):    ' . Pint::unitSystem()->name . PHP_EOL;         // USCustomary
echo 'Pint (Imp):   ' . ImperialPint::unitSystem()->name . PHP_EOL; // Imperial
echo 'NauticalMile: ' . NauticalMile::unitSystem()->name . PHP_EOL; // Nautical
echo 'Percent:      ' . Percent::unitSystem()->name . PHP_EOL;      // Dimensionless
echo 'Minute:       ' . Minute::unitSystem()->name . PHP_EOL;       // Other

// Filtering units by system
echo PHP_EOL . 'Filtering by system' . PHP_EOL;
echo '===================' . PHP_EOL . PHP_EOL;

$units = [
    Meter::class,
    Kilometer::class,
    Celsius::class,
    Foot::class,
    Pint::class,
    ImperialPint::class,
    NauticalMile::class,
];

$imperialUnits = array_filter($units, fn (string $class) => $class::unitSystem() === UnitSystem::Imperial);

echo 'Imperial units from list: ' . implode(', ', array_map(fn (string $class) => $class::getSymbol(), $imperialUnits)) . PHP_EOL;

// Grouping units by system
echo PHP_EOL . 'Grouping by system' . PHP_EOL;
echo '==================' . PHP_EOL . PHP_EOL;

$grouped = [];
foreach ($units as $class) {
    $system = $class::unitSystem()->name;
    $grouped[$system][] = $class::getSymbol();
}

foreach ($grouped as $system => $symbols) {
    echo $system . ': ' . implode(', ', $symbols) . PHP_EOL;
}
