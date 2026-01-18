<?php

namespace Tests\Unit;

use App\Http\Middleware\RedirectToLocale;
use Illuminate\Http\Request;
use Tests\TestCase;

class RedirectToLocaleTest extends TestCase
{
    public function test_redirects_to_default_locale_when_no_cookie(): void
    {
        config(['localization.default' => 'en']);
        config(['localization.locales' => ['en' => 'English', 'pl' => 'Polski']]);

        $request = Request::create('/');
        $middleware = new RedirectToLocale();

        $response = $middleware->handle($request, fn () => response('next'));

        $this->assertTrue($response->isRedirect());
        $this->assertStringContainsString('/en', $response->headers->get('Location'));
    }

    public function test_redirects_to_cookie_locale_when_valid(): void
    {
        config(['localization.default' => 'en']);
        config(['localization.cookie_name' => 'locale']);
        config(['localization.locales' => ['en' => 'English', 'pl' => 'Polski']]);

        $request = Request::create('/');
        $request->cookies->set('locale', 'pl');
        $middleware = new RedirectToLocale();

        $response = $middleware->handle($request, fn () => response('next'));

        $this->assertTrue($response->isRedirect());
        $this->assertStringContainsString('/pl', $response->headers->get('Location'));
    }

    public function test_ignores_invalid_cookie_locale(): void
    {
        config(['localization.default' => 'en']);
        config(['localization.cookie_name' => 'locale']);
        config(['localization.locales' => ['en' => 'English', 'pl' => 'Polski']]);

        $request = Request::create('/');
        $request->cookies->set('locale', 'fr');
        $middleware = new RedirectToLocale();

        $response = $middleware->handle($request, fn () => response('next'));

        $this->assertTrue($response->isRedirect());
        $this->assertStringContainsString('/en', $response->headers->get('Location'));
    }
}
