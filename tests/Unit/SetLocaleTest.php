<?php

namespace Tests\Unit;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class SetLocaleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['localization.locales' => ['en' => 'English', 'pl' => 'Polski']]);
        config(['localization.default' => 'en']);
        config(['localization.cookie_name' => 'locale']);
        config(['localization.cookie_lifetime' => 43200]);
    }

    public function test_sets_locale_from_route_parameter(): void
    {
        $request = Request::create('/pl/about');
        $request->setRouteResolver(fn () => new class {
            public function parameter($key)
            {
                return $key === 'locale' ? 'pl' : null;
            }
        });

        $middleware = new SetLocale();
        $middleware->handle($request, fn () => response('next'));

        $this->assertSame('pl', App::getLocale());
    }

    public function test_sets_locale_from_cookie_when_no_route_param(): void
    {
        $request = Request::create('/contact', 'POST');
        $request->cookies->set('locale', 'pl');
        $request->setRouteResolver(fn () => new class {
            public function parameter($key)
            {
                return null;
            }
        });

        $middleware = new SetLocale();
        $middleware->handle($request, fn () => response('next'));

        $this->assertSame('pl', App::getLocale());
    }

    public function test_falls_back_to_default_when_no_cookie(): void
    {
        $request = Request::create('/contact', 'POST');
        $request->setRouteResolver(fn () => new class {
            public function parameter($key)
            {
                return null;
            }
        });

        $middleware = new SetLocale();
        $middleware->handle($request, fn () => response('next'));

        $this->assertSame('en', App::getLocale());
    }

    public function test_ignores_invalid_cookie_locale(): void
    {
        $request = Request::create('/contact', 'POST');
        $request->cookies->set('locale', 'fr');
        $request->setRouteResolver(fn () => new class {
            public function parameter($key)
            {
                return null;
            }
        });

        $middleware = new SetLocale();
        $middleware->handle($request, fn () => response('next'));

        $this->assertSame('en', App::getLocale());
    }

    public function test_ignores_invalid_route_locale(): void
    {
        $request = Request::create('/de/about');
        $request->setRouteResolver(fn () => new class {
            public function parameter($key)
            {
                return $key === 'locale' ? 'de' : null;
            }
        });

        $middleware = new SetLocale();
        $middleware->handle($request, fn () => response('next'));

        $this->assertSame('en', App::getLocale());
    }
}
