<?php

declare(strict_types=1);

use Mesura\Customise;
use Mesura\Length\Fathom;
use Mesura\Length\Meter;
use Mesura\MeasurementUnit;

afterEach(function () {
    MeasurementUnit::resetAllSymbols();
});

test('changes symbols successfully', function () {
    Customise::unitSymbols([
        Meter::class  => 'METRE',
        Fathom::class => 'FATHOM',
    ]);

    expect(Meter::getSymbol())->toBe('METRE');
    expect(Fathom::getSymbol())->toBe('FATHOM');
    expect(Meter::getSymbol())->not->toBe('m');
    expect(Fathom::getSymbol())->not->toBe('ftm');
});

test('throws for non-existent class', function () {
    Customise::unitSymbols([ // @phpstan-ignore argument.type (intentionally passing invalid class name)
        'NonExistentClass' => 'SYMBOL',
    ]);
})->throws(InvalidArgumentException::class, 'Class NonExistentClass does not exist.');

test('throws for invalid measurement unit class', function () {
    Customise::unitSymbols([
        stdClass::class => 'SYMBOL',
    ]);
})->throws(InvalidArgumentException::class, 'Class stdClass does not exist.');
