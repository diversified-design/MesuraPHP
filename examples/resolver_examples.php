<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\InvalidUnitException;
use Mesura\Length\Length;
use Mesura\Pressure\Pressure;
use Mesura\Temperature\Temperature;
use Mesura\Volume\Volume;
use Mesura\Weight\Weight;

// =============================================================================
// Unit Resolvers — resolve a string identifier to a unit instance
// =============================================================================

// Example 1: Resolve by symbol
echo 'Example 1: Resolve by symbol' . PHP_EOL;
$distance = Length::resolve('km', 42.0);
echo "Length::resolve('km', 42.0) → {$distance}" . PHP_EOL;

$temp = Temperature::resolve('°C', 20.0);
echo "Temperature::resolve('°C', 20.0) → {$temp}" . PHP_EOL;

$weight = Weight::resolve('lb', 150.0);
echo "Weight::resolve('lb', 150.0) → {$weight}" . PHP_EOL;

// Example 2: Resolve by name
echo PHP_EOL . 'Example 2: Resolve by name' . PHP_EOL;
$meter = Length::resolve('meter', 100.0);
echo "Length::resolve('meter', 100.0) → {$meter}" . PHP_EOL;

$metre = Length::resolve('metre', 100.0);
echo "Length::resolve('metre', 100.0) → {$metre}" . PHP_EOL;

$celsius = Temperature::resolve('celsius', 28.0);
echo "Temperature::resolve('celsius', 28.0) → {$celsius}" . PHP_EOL;

$centigrade = Temperature::resolve('centigrade', 28.0);
echo "Temperature::resolve('centigrade', 28.0) → {$centigrade}" . PHP_EOL;

// Example 3: Case-insensitive matching
echo PHP_EOL . 'Example 3: Case-insensitive' . PHP_EOL;
echo "Length::resolve('KM', 5.0) → " . Length::resolve('KM', 5.0) . PHP_EOL;
echo "Length::resolve('Meter', 1.0) → " . Length::resolve('Meter', 1.0) . PHP_EOL;
echo "Temperature::resolve('FAHRENHEIT', 72.0) → " . Temperature::resolve('FAHRENHEIT', 72.0) . PHP_EOL;

// Example 4: Metric prefix composition
echo PHP_EOL . 'Example 4: Metric prefix composition (no manual alias needed)' . PHP_EOL;
echo "Length::resolve('nanometer', 500.0) → " . Length::resolve('nanometer', 500.0) . PHP_EOL;
echo "Length::resolve('hectometer', 2.0) → " . Length::resolve('hectometer', 2.0) . PHP_EOL;
echo "Weight::resolve('milligram', 250.0) → " . Weight::resolve('milligram', 250.0) . PHP_EOL;
echo "Volume::resolve('centiliter', 33.0) → " . Volume::resolve('centiliter', 33.0) . PHP_EOL;
echo "Volume::resolve('centilitre', 33.0) → " . Volume::resolve('centilitre', 33.0) . PHP_EOL;

// Example 5: Resolve class-string only (deferred construction)
echo PHP_EOL . 'Example 5: resolveUnitClass — get the class, not an instance' . PHP_EOL;
$class = Length::resolveUnitClass('foot');
echo "Length::resolveUnitClass('foot') → {$class}" . PHP_EOL;
echo "Then instantiate: new {$class}(6.0) → " . new $class(6.0) . PHP_EOL;

// Example 6: Resolve and chain conversions
echo PHP_EOL . 'Example 6: Resolve then convert' . PHP_EOL;
$miles = Length::resolve('mile', 26.2);
$km    = $miles->toKilometer();
echo "A marathon: Length::resolve('mile', 26.2)->toKilometer() → {$km->toFormat('%.2f %s')}" . PHP_EOL;

$bodyTemp = Temperature::resolve('fahrenheit', 98.6);
$inC      = $bodyTemp->toCelsius();
echo "Body temperature: Temperature::resolve('fahrenheit', 98.6)->toCelsius() → {$inC->toFormat('%.1f %s')}" . PHP_EOL;

$pressure = Pressure::resolve('psi', 32.0);
$inBar    = $pressure->toBar();
echo "Tire pressure: Pressure::resolve('psi', 32.0)->toBar() → {$inBar->toFormat('%.2f %s')}" . PHP_EOL;

// Example 7: Disambiguating similar units
echo PHP_EOL . 'Example 7: Disambiguating units with shared names' . PHP_EOL;
$statute  = Length::resolve('mile', 1.0);
$nautical = Length::resolve('nautical mile', 1.0);
$survey   = Length::resolve('survey mile', 1.0);
echo "Length::resolve('mile', 1.0)          → " . get_class($statute) . " ({$statute->toMeter()->toFormat('%.2f %s')})" . PHP_EOL;
echo "Length::resolve('nautical mile', 1.0) → " . get_class($nautical) . " ({$nautical->toMeter()->toFormat('%.2f %s')})" . PHP_EOL;
echo "Length::resolve('survey mile', 1.0)   → " . get_class($survey) . " ({$survey->toMeter()->toFormat('%.2f %s')})" . PHP_EOL;

// Example 8: Error handling
echo PHP_EOL . 'Example 8: Error handling' . PHP_EOL;
try {
    Length::resolve('parsec', 1.0);
} catch (InvalidUnitException $e) {
    echo "Caught: {$e->getMessage()}" . PHP_EOL;
}

// Example 9: Practical use case — processing a data array
echo PHP_EOL . 'Example 9: Processing input data' . PHP_EOL;
$readings = [
    ['value' => 22.5, 'unit' => 'celsius'],
    ['value' => 1013.25, 'unit' => 'hPa'],
    ['value' => 15.0, 'unit' => 'km/h'],
];

foreach ($readings as $reading) {
    // Determine the domain and resolve
    $resolved = match (true) {
        str_contains($reading['unit'], 'celsius'),
        str_contains($reading['unit'], 'fahrenheit') => Temperature::resolve($reading['unit'], $reading['value']),
        str_contains($reading['unit'], 'Pa'),
        str_contains($reading['unit'], 'bar')        => Pressure::resolve($reading['unit'], $reading['value']),
        default                                       => null,
    };

    if ($resolved !== null) {
        echo "  {$reading['value']} {$reading['unit']} → {$resolved}" . PHP_EOL;
    }
}
