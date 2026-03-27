<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Base URL
     |--------------------------------------------------------------------------
     |
     | The base URL used to build absolute URLs in the sitemap.
     |
     */
    'base_url' => env('SITEMAP_BASE_URL', 'https://laragod.com'),

    /*
     |--------------------------------------------------------------------------
     | Controllers
     |--------------------------------------------------------------------------
     |
     | List of controller classes to scan for #[Sitemap] attributes.
     |
     */
    'controllers' => [
        App\Http\Controllers\FrontController::class,
        App\Http\Controllers\ContactController::class,
    ],
];
