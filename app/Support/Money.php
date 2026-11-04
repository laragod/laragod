<?php

declare(strict_types=1);

namespace App\Support;

final class Money
{
    public static function defaultCurrency(): string
    {
        /** @var array<string, string> $defaults */
        $defaults = config('offer.default_currency');

        return $defaults[app()->getLocale()] ?? (string) array_key_first((array) config('offer.currencies'));
    }

    /**
     * Same output as the format() function in the layout's LaragodCurrency script.
     */
    public static function format(int $amount, ?string $currency = null): string
    {
        $currency ??= self::defaultCurrency();

        /** @var array{symbol: string, symbol_first: bool, group: string} $format */
        $format = config('offer.currencies.' . $currency);
        $digits = number_format($amount, decimals: 0, thousands_separator: $format['group']);

        return $format['symbol_first'] ? $format['symbol'] . $digits : $digits . "\u{00A0}" . $format['symbol'];
    }
}
