<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// ----------------------------------------------------
// Example showing how to use the Customise class to change the unit symbols
// ----------------------------------------------------
use MeasurementUnit\Customise;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Meter;
use MeasurementUnit\Temperature\Celsius;
use MeasurementUnit\Temperature\Fahrenheit;

// Customise the unit symbols directly
// Customise::unitSymbols([
//   Meter::class  => 'METRE',
//   Fathom::class => 'FATHOM',
//   Celsius::class => '℃',
//   Fahrenheit::class => '℉'
// ]);
// or create an array and pass it whenever needed
$customUnits = [
    Meter::class      => 'METRE',
    Fathom::class     => 'FATHOM',
    Celsius::class    => '℃',
    Fahrenheit::class => '℉',
];
// Customise::unitSymbols($customUnits);

// ----------------------------------------------------

// Display the default symbols
echo "Default unit symbols:\n";
echo 'Meter: ' . Meter::getSymbol() . "\n";
echo 'Fathom: ' . Fathom::getSymbol() . "\n";
echo 'Celsius: ' . Celsius::getSymbol() . "\n";
echo 'Fahrenheit: ' . Fahrenheit::getSymbol() . "\n";

// Customise the unit symbols
Customise::unitSymbols($customUnits);

// Display the Customised symbols
echo "Customised unit symbols:\n";
echo 'Meter: ' . Meter::getSymbol() . "\n";
echo 'Fathom: ' . Fathom::getSymbol() . "\n";
echo 'Celsius: ' . Celsius::getSymbol() . "\n";
echo 'Fahrenheit: ' . Fahrenheit::getSymbol() . "\n";

// Example showing how to use the Customised units in a measurement
echo "\nA new instance of 5 meters is displayed as: \"5 METRE\" -> " . new Meter(5) . "\n";
echo "\nA new instance of 5 fathoms is displayed as: \"5 FATHOM\" -> " . new Fathom(5) . "\n";
echo "\nA new instance of 5 degrees Celsius is displayed as: \"5 ℃\" -> " . new Celsius(5) . "\n";
echo "\nA new instance of 5 degrees Fahrenheit is displayed as: \"5 ℉\" -> " . new Fahrenheit(5) . "\n";

// Error handling demonstration
try {
    Customise::unitSymbols([
        'NonExistentClass' => 'SYMBOL',
    ]);
} catch (InvalidArgumentException $e) {
    echo "\nError: " . $e->getMessage() . "\n";
}

// Demonstration with an invalid measurement unit class
try {
    Customise::unitSymbols([
        stdClass::class => 'SYMBOL',
    ]);
} catch (InvalidArgumentException $e) {
    echo "\nError: " . $e->getMessage() . "\n";
}
