<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\Volume\FluidOunce;
use Mesura\Volume\ImperialFluidOunce;
use Mesura\Volume\ImperialPint;
use Mesura\Volume\Liter;
use Mesura\Volume\Pint;

// US Customary vs Imperial — they differ on liquid volume
echo 'US Customary vs Imperial Volume' . PHP_EOL;
echo '===============================' . PHP_EOL . PHP_EOL;

$usPint  = new Pint(1.0);
$impPint = new ImperialPint(1.0);

echo "1 US pint  = {$usPint->toLiter()}" . PHP_EOL;
echo "1 Imp pint = {$impPint->toLiter()}" . PHP_EOL;
echo PHP_EOL;

$usFlOz  = new FluidOunce(1.0);
$impFlOz = new ImperialFluidOunce(1.0);

echo "1 US fl oz  = {$usFlOz->toMilliliter()}" . PHP_EOL;
echo "1 Imp fl oz = {$impFlOz->toMilliliter()}" . PHP_EOL;
echo PHP_EOL;

// Cross-system conversion
echo 'Cross-system conversions' . PHP_EOL;
echo '========================' . PHP_EOL . PHP_EOL;

$beer = new ImperialPint(1.0);
echo "1 Imperial pint = {$beer->toPint()} (US)" . PHP_EOL;

$recipe = new Liter(2.0);
echo "2 L = {$recipe->toImperialPint()} (Imperial)" . PHP_EOL;
echo "2 L = {$recipe->toPint()} (US)" . PHP_EOL;
