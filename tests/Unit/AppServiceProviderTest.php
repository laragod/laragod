<?php

namespace Tests\Unit;

use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AppServiceProviderTest extends TestCase
{
    public function test_forces_https_in_production(): void
    {
        $provider = new AppServiceProvider($this->app);

        // Simulate production environment
        $this->app['env'] = 'production';

        $provider->boot();

        // Check that URL scheme was forced to https
        $this->assertSame('https', parse_url(URL::to('/'), PHP_URL_SCHEME));
    }

    public function test_does_not_force_https_in_non_production(): void
    {
        $provider = new AppServiceProvider($this->app);

        // App is already in testing environment
        $this->assertSame('testing', $this->app->environment());

        $provider->boot();

        // URL should remain http in testing
        $this->assertSame('http', parse_url(URL::to('/'), PHP_URL_SCHEME));
    }
}
