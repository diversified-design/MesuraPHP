<?php

declare(strict_types=1);

use MeasurementUnit\Customise;
use MeasurementUnit\Length\Fathom;
use MeasurementUnit\Length\Meter;

$originalMeterSymbol = Meter::getSymbol();
$originalFathomSymbol = Fathom::getSymbol();

afterEach(function () use ($originalMeterSymbol, $originalFathomSymbol) {
    Meter::setSymbol($originalMeterSymbol);
    Fathom::setSymbol($originalFathomSymbol);
});

test('changes symbols successfully', function () use ($originalMeterSymbol, $originalFathomSymbol) {
    Customise::unitSymbols([
        Meter::class  => 'METRE',
        Fathom::class => 'FATHOM',
    ]);

    expect(Meter::getSymbol())->toBe('METRE');
    expect(Fathom::getSymbol())->toBe('FATHOM');
    expect(Meter::getSymbol())->not->toBe($originalMeterSymbol);
    expect(Fathom::getSymbol())->not->toBe($originalFathomSymbol);
});

test('throws for non-existent class', function () {
    Customise::unitSymbols([ // @phpstan-ignore argument.type (intentionally passing invalid class name)
        'NonExistentClass' => 'SYMBOL',
    ]);
})->throws(\InvalidArgumentException::class, 'Class NonExistentClass does not exist.');

test('throws for invalid measurement unit class', function () {
    Customise::unitSymbols([
        \stdClass::class => 'SYMBOL',
    ]);
})->throws(\InvalidArgumentException::class, 'Class stdClass does not exist.');
