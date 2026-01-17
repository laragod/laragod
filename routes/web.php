<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('ping', [App\Http\Controllers\HealthController::class, 'ping']);
Route::get('health', [App\Http\Controllers\HealthController::class, 'healthCheck']);
Route::get('status', [App\Http\Controllers\HealthController::class, 'status']);

// Health check routes (no locale prefix)
Route::get('ping', [HealthController::class, 'ping']);
Route::get('health', [HealthController::class, 'healthCheck']);
Route::get('status', [HealthController::class, 'status']);

// Root redirect to default locale
Route::get('/', function () {
    $defaultLocale = config('localization.default', 'en');
    $cookieLocale = request()->cookie(config('localization.cookie_name', 'locale'));
    $locales = array_keys(config('localization.locales', ['en' => 'English']));

    // Use cookie preference if valid, otherwise default
    $locale = ($cookieLocale && in_array($cookieLocale, $locales, true))
        ? $cookieLocale
        : $defaultLocale;

    return redirect()->route('home', ['locale' => $locale]);
});

// Localized routes
Route::prefix('{locale}')
    ->where(['locale' => implode('|', array_keys(config('localization.locales', ['en' => 'English'])))])
    ->group(function () {
        Route::controller(FrontController::class)->group(function () {
            Route::get('/', 'home')->name('home');
            Route::get('/work', 'work')->name('work');
            Route::get('/about', 'about')->name('about');
        });

        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact', 'index')->name('contact.show');
        });
    });

// POST contact route (locale-agnostic, uses cookie/session locale)
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
