<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('ping', [App\Http\Controllers\HealthController::class, 'ping']);
Route::get('health', [App\Http\Controllers\HealthController::class, 'healthCheck']);
Route::get('status', [App\Http\Controllers\HealthController::class, 'status']);

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/work', 'work')->name('work');
    Route::get('/about', 'about')->name('about');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.show');
    Route::post('/contact', 'store')->middleware('throttle:5,1')->name('contact.store');
});
