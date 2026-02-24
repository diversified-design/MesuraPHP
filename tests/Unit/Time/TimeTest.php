<?php

declare(strict_types=1);

use Mesura\Time\Day;
use Mesura\Time\Hour;
use Mesura\Time\Minute;
use Mesura\Time\Second;
use Mesura\Time\Time;

describe('Time', function () {
    test('stores value on construction', function () {
        $time = new class(42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($time->value)->toBe(42.0);
    });

    test('converts to all time units', function () {
        $time = new class(42.0) extends Time {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($time->toDay())->toBeInstanceOf(Day::class);
        expect($time->toHour())->toBeInstanceOf(Hour::class);
        expect($time->toMinute())->toBeInstanceOf(Minute::class);
        expect($time->toSecond())->toBeInstanceOf(Second::class);
        expect($time->toSecond()->getValue())->toEqualWithDelta(21.0, 0.000001);
    });

    test('casts to string', function () {
        $time = new class(42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value): static
            {
                return new self($value);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        expect($time->__toString())->toBe('42 unit');
    });
});
