<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\Generic\SimpleMeasurement;

// ──────────────────────────────────────────────
// Creating a SimpleMeasurement
// ──────────────────────────────────────────────

// Using the static factory (preferred)
$pixels = SimpleMeasurement::fromValue(1920, 'MJ/m²');
echo $pixels . PHP_EOL; // toString() -> 1920 MJ/m²
dump($pixels); // dumps the whole Object

// Using the constructor directly
$score = new SimpleMeasurement(98.6, 'pts');
echo $score . PHP_EOL; // toString() -> 98.6 pts
dump($score); // dumps the whole Object

// Without a symbol
$raw = SimpleMeasurement::fromValue(42.0);
echo 'Raw value: ' . $raw->getValue() . PHP_EOL; // 42


// ──────────────────────────────────────────────
// Formatting
// ──────────────────────────────────────────────

$dpi = SimpleMeasurement::fromValue(300, 'dpi');

echo $dpi->toFormat() . PHP_EOL;                  // 300.0 dpi
echo $dpi->toFormat('%.0f %s') . PHP_EOL;          // 300 dpi
echo $dpi->toFormat('Resolution: %1$.0f %2$s') . PHP_EOL; // Resolution: 300 dpi
echo $dpi->toHtml() . PHP_EOL;
// <span class="value">300.0</span> <span class="symbol">dpi</span>


// ──────────────────────────────────────────────
// Changing the symbol per instance
// ──────────────────────────────────────────────

$brightness = SimpleMeasurement::fromValue(250, 'nits');
echo $brightness . PHP_EOL; // 250 nits

$brightness->setInstanceSymbol('cd/m²');
echo $brightness . PHP_EOL; // 250 cd/m²


// ──────────────────────────────────────────────
// Transforming values with withValue()
// ──────────────────────────────────────────────

$width = SimpleMeasurement::fromValue(1920, 'px');

$doubled = $width->withValue(fn (float $v) => $v * 2);
echo 'Doubled: ' . $doubled . PHP_EOL; // 3840 px

$halved = $width->withValue(fn (float $v) => $v / 2);
echo 'Halved: ' . $halved . PHP_EOL;   // 960 px

// Original is unchanged (withValue returns a new instance)
echo 'Original: ' . $width . PHP_EOL;  // 1920 px


// ──────────────────────────────────────────────
// Unit system is always "Other"
// ──────────────────────────────────────────────

echo 'Unit system: ' . SimpleMeasurement::unitSystem()->name . PHP_EOL; // Other
