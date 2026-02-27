<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\ArealDensity\GramPerSquareMeter;
use Mesura\ArealDensity\OuncePerSquareYard;
use Mesura\Irradiance\WattPerSquareMeter;
use Mesura\MassConcentration\MicrogramPerCubicMeter;
use Mesura\SpecificEnergy\KilojoulePerKilogram;

// Areal Density — paper weight (GSM), fabric weight
echo 'Areal Density' . PHP_EOL;
echo '=============' . PHP_EOL . PHP_EOL;

$gsm = new GramPerSquareMeter(200.0);
echo "200 GSM paper = {$gsm->toKilogramPerSquareMeter()} (SI)" . PHP_EOL;
echo "200 GSM paper = {$gsm->toOuncePerSquareYard()} (textile)" . PHP_EOL;

$fabric = new OuncePerSquareYard(6.0);
echo "6 oz/yd² fabric = {$fabric->toGramPerSquareMeter()} (metric)" . PHP_EOL;

// Mass Concentration — air quality, pollutants
echo PHP_EOL . 'Mass Concentration' . PHP_EOL;
echo '==================' . PHP_EOL . PHP_EOL;

$pm25 = new MicrogramPerCubicMeter(35.0);
echo "PM2.5 limit: {$pm25}" . PHP_EOL;
echo "  = {$pm25->toMilligramPerCubicMeter()}" . PHP_EOL;
echo "  = {$pm25->toKilogramPerCubicMeter()}" . PHP_EOL;
echo "  = {$pm25->toGrainPerCubicFoot()}" . PHP_EOL;

// Specific Energy — fuel energy density
echo PHP_EOL . 'Specific Energy' . PHP_EOL;
echo '===============' . PHP_EOL . PHP_EOL;

$diesel = new KilojoulePerKilogram(45500.0);
echo "Diesel: {$diesel}" . PHP_EOL;
echo "  = {$diesel->toJoulePerKilogram()}" . PHP_EOL;
echo "  = {$diesel->toBtuPerPound()}" . PHP_EOL;
echo "  = {$diesel->toCaloriePerGram()}" . PHP_EOL;

// Irradiance — solar radiation
echo PHP_EOL . 'Irradiance' . PHP_EOL;
echo '==========' . PHP_EOL . PHP_EOL;

$solar = new WattPerSquareMeter(1000.0);
echo "Peak sunlight: {$solar}" . PHP_EOL;
echo "  = {$solar->toKilowattPerSquareMeter()}" . PHP_EOL;
echo "  = {$solar->toBtuPerHourPerSquareFoot()}" . PHP_EOL;
