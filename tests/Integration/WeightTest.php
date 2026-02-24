<?php

declare(strict_types=1);

use Mesura\Weight\Centigram;
use Mesura\Weight\Decagram;
use Mesura\Weight\Decigram;
use Mesura\Weight\Gram;
use Mesura\Weight\Hectogram;
use Mesura\Weight\Kilogram;
use Mesura\Weight\Megagram;
use Mesura\Weight\MetricTon;
use Mesura\Weight\Microgram;
use Mesura\Weight\Milligram;
use Mesura\Weight\Nanogram;
use Mesura\Weight\Pound;

dataset('weight units', function () {
    yield Gram::class => [new Gram(42.0)];
    yield Milligram::class => [new Milligram(42.0)];
    yield Microgram::class => [new Microgram(42.0)];
    yield Nanogram::class => [new Nanogram(42.0)];
    yield Decigram::class => [new Decigram(42.0)];
    yield Centigram::class => [new Centigram(42.0)];
    yield Decagram::class => [new Decagram(42.0)];
    yield Hectogram::class => [new Hectogram(42.0)];
    yield Megagram::class => [new Megagram(42.0)];
    yield Kilogram::class => [new Kilogram(42.0)];
    yield MetricTon::class => [new MetricTon(42.0)];
    yield Pound::class => [new Pound(42.0)];
});

test('round-trips through kilogram value', function ($weight) {
    expect($weight::fromKilogramValue($weight->toKilogramValue()))
        ->toEqualWithDelta($weight, 0.000001)
    ;
})->with('weight units');

test('converts at correct rate', function () {
    expect((new Kilogram(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(42.0), 0.000001);
    expect((new MetricTon(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(42000.0), 0.000001);
    expect((new Pound(42.0))->toKilogram())->toEqualWithDelta(new Kilogram(19.050864), 0.000001);
});
