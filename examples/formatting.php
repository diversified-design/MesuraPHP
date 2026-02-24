<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MeasurementUnit\Length\Meter;

$meter = new Meter(12.478665487653984756);

// Using custom sprintf format string
echo 'Custom format with sprintf template:' . PHP_EOL;
echo $meter->toFormat('%.2f m') . PHP_EOL . PHP_EOL; // 12.48 m

// Using default HTML template
echo 'HTML output with default template:' . PHP_EOL;
echo $meter->toHtml() . PHP_EOL . PHP_EOL; // <span class="value">12.5</span> <span class="symbol">m</span>

// Custom HTML template and custom symbol
echo 'HTML output with custom template and symbol:' . PHP_EOL;
echo $meter->setInstanceSymbol('メートル')->toHtml('<v>%.3f</v>　<u>%s</u>') . PHP_EOL . PHP_EOL; // <v>12.479</v>　<u>メートル</u>
