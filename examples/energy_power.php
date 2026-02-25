<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Mesura\Energy\BritishThermalUnit;
use Mesura\Energy\Calorie;
use Mesura\Energy\Joule;
use Mesura\Energy\Kilocalorie;
use Mesura\Energy\KilowattHour;
use Mesura\Power\BtuPerHour;
use Mesura\Power\Horsepower;
use Mesura\Power\Kilowatt;
use Mesura\Power\Watt;

// Energy conversions
echo 'Energy Conversions' . PHP_EOL;
echo '==================' . PHP_EOL . PHP_EOL;

$energy = new Joule(1055.05585262);
echo "1055.06 J = {$energy->toBritishThermalUnit()->getValue()} BTU" . PHP_EOL;

$kcal = new Kilocalorie(1.0);
echo "1 kcal = {$kcal->toJoule()->getValue()} J" . PHP_EOL;
echo "1 kcal = {$kcal->toCalorie()->getValue()} cal" . PHP_EOL;
echo "1 kcal = {$kcal->toBritishThermalUnit()} (with symbol)" . PHP_EOL;

$kwh = new KilowattHour(1.0);
echo "1 kWh = {$kwh->toJoule()->getValue()} J" . PHP_EOL;

// Power conversions
echo PHP_EOL . 'Power Conversions' . PHP_EOL;
echo '=================' . PHP_EOL . PHP_EOL;

$hp = new Horsepower(1.0);
echo "1 hp = {$hp->toWatt()} (with symbol)" . PHP_EOL;
echo "1 hp = {$hp->toKilowatt()->getValue()} kW" . PHP_EOL;
echo "1 hp = {$hp->toBtuPerHour()->getValue()} BTU/h" . PHP_EOL;

$kw = new Kilowatt(1.5);
echo "1.5 kW = {$kw->toHorsepower()->getValue()} hp" . PHP_EOL;

// Fluent chain: BTU/h to watts, doubled, to kilowatts
$result = (new BtuPerHour(10000.0))
    ->toWatt()
    ->withValue(fn ($v) => $v * 2)
    ->toKilowatt();
echo "10,000 BTU/h doubled = {$result->getValue()} kW" . PHP_EOL;
