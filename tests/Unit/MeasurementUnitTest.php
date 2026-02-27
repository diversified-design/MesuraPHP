<?php

declare(strict_types=1);

use Mesura\MeasurementUnit;

test('getValue returns construction value', function () {
    $unit = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->getValue())->toBe(42.0);
});

test('getInstanceSymbol returns class symbol by default', function () {
    $unit = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->getInstanceSymbol())->toBe('unit');
});

test('getInstanceSymbol returns custom symbol when provided', function () {
    $unit = new class(42.0, 'custom') extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->getInstanceSymbol())->toBe('custom');
});

test('setInstanceSymbol changes instance symbol and returns self', function () {
    $unit = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->setInstanceSymbol('customSymbol'))->toBe($unit);
    expect($unit->getInstanceSymbol())->toBe('customSymbol');
});

test('setSymbol changes default symbol', function () {
    $unitClass = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return self::$defaultSymbol;
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    $className      = get_class($unitClass);
    $originalSymbol = $className::getSymbol();

    expect($className::setSymbol('newSymbol'))->toBe('newSymbol');
    expect($className::getSymbol())->toBe('newSymbol');

    $className::setSymbol($originalSymbol);
});

test('setSymbol affects new instances', function () {
    $unitClass = new class(0.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return self::$defaultSymbol;
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    $className      = get_class($unitClass);
    $originalSymbol = $className::getSymbol();

    $className::setSymbol('changedSymbol');

    expect($className::getSymbol())->toBe('changedSymbol');

    $newInstance = new $className(42.0);
    expect($newInstance->getInstanceSymbol())->toBe('changedSymbol');

    $className::setSymbol($originalSymbol);
});

test('toFormat formats value with symbol', function () {
    $unit = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->toFormat())->toBe('42.0 unit');
    expect($unit->toFormat('Value: %.1f, Symbol: %s'))->toBe('Value: 42.0, Symbol: unit');
    expect($unit->toFormat('%.2f'))->toBe('42.00');
});

test('toHtml wraps value and symbol in spans', function () {
    $unit = new class(42.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->toHtml())->toBe('<span class="value">42.0</span> <span class="symbol">unit</span>');

    $customTemplate = '<div class="measurement"><strong>%1$.2f</strong><em>%2$s</em></div>';
    expect($unit->toHtml($customTemplate))->toBe('<div class="measurement"><strong>42.00</strong><em>unit</em></div>');
});

test('withValue transforms value and preserves type', function () {
    $unit = new class(10.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    $result = $unit->withValue(fn (float $v) => $v * 3);

    expect($result)->toBeInstanceOf(get_class($unit));
    expect($result->getValue())->toBe(30.0);
    expect($result->getInstanceSymbol())->toBe('unit');
    expect($result)->not->toBe($unit);
});

test('withValue returns a new instance', function () {
    $unit = new class(5.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    $result = $unit->withValue(fn (float $v) => $v);

    expect($result)->not->toBe($unit);
    expect($result->getValue())->toBe(5.0);
});

test('withValue casts integer return to float', function () {
    $unit = new class(4.0) extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    $result = $unit->withValue(fn (float $v) => (int) ($v * 2));

    expect($result->getValue())->toBe(8.0);
});

test('formatting uses custom instance symbol', function () {
    $unit = new class(42.0, 'custom') extends MeasurementUnit {
        public static function getSymbol(): string
        {
            return 'unit';
        }

        public static function unitSystem(): Mesura\UnitSystem
        {
            return Mesura\UnitSystem::Other;
        }
    };

    expect($unit->toFormat())->toBe('42.0 custom');
    expect($unit->toHtml())->toBe('<span class="value">42.0</span> <span class="symbol">custom</span>');
});
