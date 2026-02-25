<?php

declare(strict_types=1);

use Mesura\UnitSystem;

/*
|--------------------------------------------------------------------------
| UnitSystem Integration Test
|--------------------------------------------------------------------------
|
| Verifies that every concrete unit class returns the expected UnitSystem.
| Dataset is built by scanning all src subdirectories for concrete classes
| that implement unitSystem().
|
*/

dataset('unit-system-classifications', function () {
    // SI Explicit
    yield 'Meter' => [Mesura\Length\Meter::class, UnitSystem::SI];
    yield 'SquareMeter' => [Mesura\Area\SquareMeter::class, UnitSystem::SI];
    yield 'Kelvin' => [Mesura\Temperature\Kelvin::class, UnitSystem::SI];
    yield 'Second' => [Mesura\Time\Second::class, UnitSystem::SI];
    yield 'Pascal' => [Mesura\Pressure\Pascal::class, UnitSystem::SI];
    yield 'Hectopascal' => [Mesura\Pressure\Hectopascal::class, UnitSystem::SI];
    yield 'Kilopascal' => [Mesura\Pressure\Kilopascal::class, UnitSystem::SI];
    yield 'MeterPerSecond' => [Mesura\Speed\MeterPerSecond::class, UnitSystem::SI];
    yield 'Radian' => [Mesura\Angle\Radian::class, UnitSystem::SI];
    yield 'NewtonMeter' => [Mesura\Torque\NewtonMeter::class, UnitSystem::SI];
    yield 'Joule' => [Mesura\Energy\Joule::class, UnitSystem::SI];
    yield 'Watt' => [Mesura\Power\Watt::class, UnitSystem::SI];
    yield 'CubicMeter' => [Mesura\Volume\CubicMeter::class, UnitSystem::SI];
    yield 'KilogramPerCubicMeter' => [Mesura\MassConcentration\KilogramPerCubicMeter::class, UnitSystem::SI];
    yield 'KilogramPerSquareMeter' => [Mesura\ArealDensity\KilogramPerSquareMeter::class, UnitSystem::SI];
    yield 'WattPerSquareMeter' => [Mesura\Irradiance\WattPerSquareMeter::class, UnitSystem::SI];
    yield 'KilowattPerSquareMeter' => [Mesura\Irradiance\KilowattPerSquareMeter::class, UnitSystem::SI];
    yield 'JoulePerKilogram' => [Mesura\SpecificEnergy\JoulePerKilogram::class, UnitSystem::SI];
    yield 'KilojoulePerKilogram' => [Mesura\SpecificEnergy\KilojoulePerKilogram::class, UnitSystem::SI];
    yield 'MegajoulePerKilogram' => [Mesura\SpecificEnergy\MegajoulePerKilogram::class, UnitSystem::SI];

    // SI via MetricX (sample from each family)
    yield 'Kilometer' => [Mesura\Length\Kilometer::class, UnitSystem::SI];
    yield 'Millimeter' => [Mesura\Length\Millimeter::class, UnitSystem::SI];
    yield 'Kilogram' => [Mesura\Weight\Kilogram::class, UnitSystem::SI];
    yield 'Milligram' => [Mesura\Weight\Milligram::class, UnitSystem::SI];
    yield 'Kilojoule' => [Mesura\Energy\Kilojoule::class, UnitSystem::SI];
    yield 'Millijoule' => [Mesura\Energy\Millijoule::class, UnitSystem::SI];
    yield 'Kilowatt' => [Mesura\Power\Kilowatt::class, UnitSystem::SI];
    yield 'Milliwatt' => [Mesura\Power\Milliwatt::class, UnitSystem::SI];
    yield 'Milliliter' => [Mesura\Volume\Milliliter::class, UnitSystem::SI];
    yield 'Kiloliter' => [Mesura\Volume\Kiloliter::class, UnitSystem::SI];
    yield 'SquareKilometer' => [Mesura\Area\SquareKilometer::class, UnitSystem::SI];
    yield 'SquareMillimeter' => [Mesura\Area\SquareMillimeter::class, UnitSystem::SI];

    // Metric
    yield 'Gram' => [Mesura\Weight\Gram::class, UnitSystem::Metric];
    yield 'MetricTon' => [Mesura\Weight\MetricTon::class, UnitSystem::Metric];
    yield 'Liter' => [Mesura\Volume\Liter::class, UnitSystem::Metric];
    yield 'Hectare' => [Mesura\Area\Hectare::class, UnitSystem::Metric];
    yield 'Celsius' => [Mesura\Temperature\Celsius::class, UnitSystem::Metric];
    yield 'Bar' => [Mesura\Pressure\Bar::class, UnitSystem::Metric];
    yield 'Millibar' => [Mesura\Pressure\Millibar::class, UnitSystem::Metric];
    yield 'Calorie' => [Mesura\Energy\Calorie::class, UnitSystem::Metric];
    yield 'Kilocalorie' => [Mesura\Energy\Kilocalorie::class, UnitSystem::Metric];
    yield 'WattHour' => [Mesura\Energy\WattHour::class, UnitSystem::Metric];
    yield 'KilowattHour' => [Mesura\Energy\KilowattHour::class, UnitSystem::Metric];
    yield 'KilometerPerHour' => [Mesura\Speed\KilometerPerHour::class, UnitSystem::Metric];
    yield 'CaloriePerSecond' => [Mesura\Power\CaloriePerSecond::class, UnitSystem::Metric];
    yield 'CaloriePerGram' => [Mesura\SpecificEnergy\CaloriePerGram::class, UnitSystem::Metric];
    yield 'GramPerSquareMeter' => [Mesura\ArealDensity\GramPerSquareMeter::class, UnitSystem::Metric];
    yield 'GramPerCubicMeter' => [Mesura\MassConcentration\GramPerCubicMeter::class, UnitSystem::Metric];
    yield 'MilligramPerCubicMeter' => [Mesura\MassConcentration\MilligramPerCubicMeter::class, UnitSystem::Metric];
    yield 'MicrogramPerCubicMeter' => [Mesura\MassConcentration\MicrogramPerCubicMeter::class, UnitSystem::Metric];

    // Imperial
    yield 'Foot' => [Mesura\Length\Foot::class, UnitSystem::Imperial];
    yield 'Inch' => [Mesura\Length\Inch::class, UnitSystem::Imperial];
    yield 'Yard' => [Mesura\Length\Yard::class, UnitSystem::Imperial];
    yield 'StatuteMile' => [Mesura\Length\StatuteMile::class, UnitSystem::Imperial];
    yield 'Thou' => [Mesura\Length\Thou::class, UnitSystem::Imperial];
    yield 'Furlong' => [Mesura\Length\Furlong::class, UnitSystem::Imperial];
    yield 'Pound' => [Mesura\Weight\Pound::class, UnitSystem::Imperial];
    yield 'SquareFoot' => [Mesura\Area\SquareFoot::class, UnitSystem::Imperial];
    yield 'SquareMile' => [Mesura\Area\SquareMile::class, UnitSystem::Imperial];
    yield 'Acre' => [Mesura\Area\Acre::class, UnitSystem::Imperial];
    yield 'Fahrenheit' => [Mesura\Temperature\Fahrenheit::class, UnitSystem::Imperial];
    yield 'PoundPerSquareInch' => [Mesura\Pressure\PoundPerSquareInch::class, UnitSystem::Imperial];
    yield 'BritishThermalUnit' => [Mesura\Energy\BritishThermalUnit::class, UnitSystem::Imperial];
    yield 'FootPound' => [Mesura\Energy\FootPound::class, UnitSystem::Imperial];
    yield 'Horsepower' => [Mesura\Power\Horsepower::class, UnitSystem::Imperial];
    yield 'BtuPerHour' => [Mesura\Power\BtuPerHour::class, UnitSystem::Imperial];
    yield 'FootPoundPerSecond' => [Mesura\Power\FootPoundPerSecond::class, UnitSystem::Imperial];
    yield 'MilesPerHour' => [Mesura\Speed\MilesPerHour::class, UnitSystem::Imperial];
    yield 'CubicInch' => [Mesura\Volume\CubicInch::class, UnitSystem::Imperial];
    yield 'CubicYard' => [Mesura\Volume\CubicYard::class, UnitSystem::Imperial];
    yield 'OuncePerSquareYard' => [Mesura\ArealDensity\OuncePerSquareYard::class, UnitSystem::Imperial];
    yield 'PoundPerSquareFoot' => [Mesura\ArealDensity\PoundPerSquareFoot::class, UnitSystem::Imperial];
    yield 'BtuPerPound' => [Mesura\SpecificEnergy\BtuPerPound::class, UnitSystem::Imperial];
    yield 'BtuPerHourPerSquareFoot' => [Mesura\Irradiance\BtuPerHourPerSquareFoot::class, UnitSystem::Imperial];
    yield 'GrainPerCubicMeter' => [Mesura\MassConcentration\GrainPerCubicMeter::class, UnitSystem::Imperial];
    yield 'GrainPerCubicFoot' => [Mesura\MassConcentration\GrainPerCubicFoot::class, UnitSystem::Imperial];

    // USCustomary
    yield 'SurveyMile' => [Mesura\Length\SurveyMile::class, UnitSystem::USCustomary];
    yield 'Pint' => [Mesura\Volume\Pint::class, UnitSystem::USCustomary];
    yield 'Quart' => [Mesura\Volume\Quart::class, UnitSystem::USCustomary];
    yield 'FluidOunce' => [Mesura\Volume\FluidOunce::class, UnitSystem::USCustomary];
    yield 'FluidDram' => [Mesura\Volume\FluidDram::class, UnitSystem::USCustomary];
    yield 'TableSpoon' => [Mesura\Volume\TableSpoon::class, UnitSystem::USCustomary];

    // Nautical
    yield 'NauticalMile' => [Mesura\Length\NauticalMile::class, UnitSystem::Nautical];
    yield 'Fathom' => [Mesura\Length\Fathom::class, UnitSystem::Nautical];
    yield 'Knot' => [Mesura\Speed\Knot::class, UnitSystem::Nautical];

    // Dimensionless
    yield 'Percent' => [Mesura\Percentage\Percent::class, UnitSystem::Dimensionless];
    yield 'PartsPerMillion' => [Mesura\Percentage\PartsPerMillion::class, UnitSystem::Dimensionless];
    yield 'PartsPerBillion' => [Mesura\Percentage\PartsPerBillion::class, UnitSystem::Dimensionless];

    // Other
    yield 'Degree' => [Mesura\Angle\Degree::class, UnitSystem::Other];
    yield 'Rankine' => [Mesura\Temperature\Rankine::class, UnitSystem::Other];
    yield 'MillimetreOfMercury' => [Mesura\Pressure\MillimetreOfMercury::class, UnitSystem::Other];
    yield 'StandardAtmosphere' => [Mesura\Pressure\StandardAtmosphere::class, UnitSystem::Other];
    yield 'Torr' => [Mesura\Pressure\Torr::class, UnitSystem::Other];
    yield 'Minute' => [Mesura\Time\Minute::class, UnitSystem::Other];
    yield 'Hour' => [Mesura\Time\Hour::class, UnitSystem::Other];
    yield 'Day' => [Mesura\Time\Day::class, UnitSystem::Other];
    yield 'HorseLength' => [Mesura\Length\HorseLength::class, UnitSystem::Other];
});

test('unit returns expected UnitSystem', function (string $class, UnitSystem $expected) {
    expect($class::unitSystem())->toBe($expected);
})->with('unit-system-classifications');
