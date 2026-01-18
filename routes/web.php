<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HealthController;
use App\Http\Middleware\RedirectToLocale;
use Illuminate\Support\Facades\Route;

// Health check routes (no locale prefix)
Route::get('ping', [HealthController::class, 'ping']);
Route::get('health', [HealthController::class, 'healthCheck']);
Route::get('status', [HealthController::class, 'status']);

// Root redirect to default locale
Route::get('/')->middleware(RedirectToLocale::class);

// Localized routes
Route::prefix('{locale}')
    ->where(['locale' => implode('|', array_keys(config('localization.locales', ['en' => 'English'])))])
    ->group(function (): void {
        Route::controller(FrontController::class)->group(function (): void {
            Route::get('/', 'home')->name('home');
            Route::get('/work', 'work')->name('work');
            Route::get('/about', 'about')->name('about');
        });

        Route::controller(ContactController::class)->group(function (): void {
            Route::get('/contact', 'index')->name('contact.show');
        });
    });

// POST contact route (locale-agnostic, uses cookie/session locale)
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
