@props(['prices'])

@php
    $currency = \App\Support\Money::defaultCurrency();
@endphp

<span data-price='{!! json_encode($prices, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}' {{ $attributes }}>{{ \App\Support\Money::format($prices[$currency], $currency) }}</span>
