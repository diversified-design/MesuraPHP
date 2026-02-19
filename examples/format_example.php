<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Meter;

$meter      = new Meter(12.478665487653984756);

echo $meter->toFormat('%.2f m') . PHP_EOL; // 12.48 m
echo $meter->toHTML() . PHP_EOL; // <span class="value">12.5</span> <span class="symbol">m</span>
echo $meter->setInstanceSymbol('METRE')->toHTML('<v>%.3f</v>　<u>%s</u>') . PHP_EOL; // <v>12.479</v>　<u>METRE</u>
