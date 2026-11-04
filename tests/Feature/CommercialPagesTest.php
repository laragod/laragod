<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Laragod\Toolkit\Services\NotificationManager;
use Mockery;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

final class CommercialPagesTest extends TestCase
{
    private const array LOCALES = ['en', 'pl'];

    private const array NEW_PATHS = [
        '/pricing',
        '/how-we-work',
        '/for-agencies',
        '/audit',
        '/faq',
        '/industries',
        '/industries/ecommerce',
        '/industries/sport-recreation',
        '/industries/culture-events',
        '/services/automation-integrations',
    ];

    private const array PARITY_GROUPS = [
        'offer', 'process', 'agencies', 'audit', 'industries', 'faq',
        'home', 'nav', 'footer', 'contact', 'about', 'services',
    ];

    private const array TRANSLATION_GROUPS = [
        'offer', 'process', 'agencies', 'audit', 'industries', 'faq', 'home',
        'nav', 'footer', 'contact', 'about', 'services', 'meta', 'work',
    ];

    /**
     * @return array<string, array{string}>
     */
    public static function localizedPages(): array
    {
        $pages = [];

        foreach (self::LOCALES as $locale) {
            foreach (['', '/about', '/contact', '/services', ...self::NEW_PATHS] as $path) {
                $pages["/{$locale}{$path}"] = ["/{$locale}{$path}"];
            }
        }

        return $pages;
    }

    /**
     * @return array<string, array{string}>
     */
    public static function parityGroups(): array
    {
        return array_combine(self::PARITY_GROUPS, array_map(fn (string $group): array => [$group], self::PARITY_GROUPS));
    }

    #[DataProvider('localizedPages')]
    public function test_page_renders_without_raw_translation_keys_or_database_use(string $url): void
    {
        DB::enableQueryLog();

        $html = $this->get($url)->assertOk()->getContent();

        $this->assertSame([], DB::getQueryLog(), "{$url} ran a database query");

        $groups = implode('|', self::TRANSLATION_GROUPS);
        $key = '/(?<![\w\/.@-])(?:' . $groups . ')\.[a-z0-9_]+(?:\.[a-z0-9_-]+)*\b(?![\w(])/';

        $this->assertSame(0, preg_match($key, $html, $match), "{$url} contains the raw key: " . ($match[0] ?? ''));

        $visible = strip_tags((string) preg_replace('#<(script|style)\b.*?</\1>#is', '', $html));

        $this->assertSame(0, preg_match('/(?<![\w:]):[a-z_]{3,}\b/', $visible, $match), "{$url} contains the placeholder: " . ($match[0] ?? ''));
    }

    public function test_unknown_industry_returns_404(): void
    {
        $this->withoutExceptionHandling();

        foreach (self::LOCALES as $locale) {
            try {
                $this->get("/{$locale}/industries/unknown-industry");
                $this->fail("{$locale}: expected a 404");
            } catch (NotFoundHttpException $exception) {
                $this->assertSame(404, $exception->getStatusCode());
            }
        }
    }

    public function test_pricing_shows_locale_default_amounts_from_config(): void
    {
        $care = config('offer.packages.care.from');

        $this->get('/pl/pricing')
            ->assertSee(number_format($care['PLN'], 0, '', "\u{00A0}") . "\u{00A0}zł", false)
            ->assertSee("1\u{00A0}500\u{00A0}zł", false)
            ->assertDontSee('£' . $care['GBP'], false);

        $this->get('/en/pricing')
            ->assertSee('£' . $care['GBP'], false)
            ->assertSee('£325', false);
    }

    public function test_prices_carry_every_currency_for_the_client_side_switch(): void
    {
        $response = $this->get('/en/pricing')->assertOk();

        $response->assertSee("data-price='" . json_encode(config('offer.packages.care.from')) . "'", false);
        $response->assertSee('data-currency-switch="PLN"', false);
        $response->assertSee('data-currency-switch="GBP"', false);
        $response->assertSee('data-currency-switch="EUR"', false);
    }

    public function test_configurator_renders_defaults_with_correct_total(): void
    {
        $offer = config('offer.configurator');
        $hours = $offer['hours'][$offer['default_hours']];
        $expected = [];

        foreach (array_keys(config('offer.currencies')) as $currency) {
            $expected[$currency] = $hours['prices'][$currency]
                + $offer['response'][$offer['default_response']]['prices'][$currency]
                + $offer['cto'][$offer['default_cto']]['prices'][$currency];
        }

        $response = $this->get('/en/pricing')->assertOk();

        $response->assertSee("data-price='" . json_encode($expected) . "' id=\"cfg-monthly-total\"", false);
        $response->assertSee('£' . number_format($expected['GBP']), false);
        $response->assertSee(__('offer.configurator.summary.hours_bonus_line', ['hours' => $offer['default_hours'], 'bonus' => $hours['bonus']]), false);
        $response->assertSee('name="cfg_h" value="' . $offer['default_hours'] . '" data-cfg="h" class="peer sr-only" checked', false);
    }

    public function test_every_priced_item_has_a_whole_amount_in_every_currency(): void
    {
        $currencies = array_keys(config('offer.currencies'));
        $offer = config('offer.configurator');
        $priced = [];

        foreach (config('offer.packages') as $key => $package) {
            $priced["packages.{$key}"] = $package['from'];
        }

        foreach (['hours', 'response', 'cto', 'addons', 'one_off'] as $group) {
            foreach ($offer[$group] as $key => $option) {
                $priced["configurator.{$group}.{$key}"] = $option['prices'];
            }
        }

        $this->assertNotEmpty($priced);

        foreach ($priced as $item => $prices) {
            $this->assertEqualsCanonicalizing($currencies, array_keys($prices), "{$item} currencies");

            foreach ($prices as $amount) {
                $this->assertIsInt($amount, $item);
                $this->assertGreaterThanOrEqual(0, $amount, $item);
            }
        }

        foreach (config('offer.default_currency') as $locale => $currency) {
            $this->assertContains($currency, $currencies, $locale);
        }

        $this->assertArrayHasKey($offer['default_hours'], $offer['hours']);
        $this->assertArrayHasKey($offer['default_response'], $offer['response']);
        $this->assertArrayHasKey($offer['default_cto'], $offer['cto']);
    }

    public function test_every_configurator_option_has_a_label_in_both_locales(): void
    {
        $offer = config('offer.configurator');

        foreach (self::LOCALES as $locale) {
            foreach (['hours', 'response', 'cto', 'addons', 'one_off'] as $group) {
                foreach (array_keys($offer[$group]) as $key) {
                    $this->assertTrue(Lang::has("offer.configurator.{$group}.options.{$key}.label", $locale), "{$locale}: {$group}.{$key}");
                }
            }

            foreach (array_keys(config('offer.packages')) as $package) {
                $this->assertTrue(Lang::has("offer.packages.{$package}.title", $locale), "{$locale}: {$package}");
            }
        }
    }

    public function test_every_audit_question_and_option_has_a_label_in_both_locales(): void
    {
        foreach (self::LOCALES as $locale) {
            foreach (config('offer.audit.questions') as $key => $question) {
                $this->assertTrue(Lang::has("audit.questions.{$key}.title", $locale), "{$locale}: {$key}");

                foreach (array_keys($question['answers']) as $answer) {
                    $this->assertTrue(Lang::has("audit.questions.{$key}.options.{$answer}", $locale), "{$locale}: {$key}.{$answer}");
                }

                if ($question['dimension'] !== null) {
                    $this->assertTrue(Lang::has("audit.result.dimensions.{$question['dimension']}.title", $locale), $question['dimension']);
                }
            }
        }
    }

    #[DataProvider('parityGroups')]
    public function test_translations_have_exact_key_parity(string $group): void
    {
        $en = Lang::get($group, [], 'en');
        $pl = Lang::get($group, [], 'pl');

        $this->assertIsArray($en);
        $this->assertSame($this->keyPaths($en), $this->keyPaths($pl));
    }

    public function test_recommendations_and_projects_resolve(): void
    {
        $packages = config('offer.packages');
        $needs = config('offer.audit.questions.need.answers');

        foreach (config('offer.audit.recommendations') as $need => $package) {
            $this->assertArrayHasKey($need, $needs);
            $this->assertArrayHasKey($package, $packages);
        }

        // "unsure" has no mapping: it resolves to one of these two at runtime.
        $this->assertArrayHasKey('unsure', $needs);
        $this->assertArrayNotHasKey('unsure', config('offer.audit.recommendations'));
        $this->assertArrayHasKey('audit', $packages);
        $this->assertArrayHasKey('care', $packages);

        $projects = FrontController::getProjectSlugs();

        foreach (config('offer.industries') as $industry) {
            $this->assertContains($industry['project'], $projects);
        }

        foreach (config('offer.home_projects') as $project) {
            $this->assertContains($project, $projects);
        }

        $this->assertSame(array_keys(config('offer.industries')), array_keys(__('industries.items')));
    }

    public function test_every_package_links_to_a_contact_form_service(): void
    {
        $labels = ContactController::getServiceLabels();

        foreach (config('offer.packages') as $package) {
            $this->assertArrayHasKey($package['service'], $labels);
        }
    }

    public function test_audit_summary_fits_the_tech_notes_limit(): void
    {
        foreach (self::LOCALES as $locale) {
            app()->setLocale($locale);

            $length = mb_strlen(__('audit.result.contact_note'));

            foreach (config('offer.audit.questions') as $key => $question) {
                $labels = array_map(fn (string|int $answer): int => mb_strlen(__("audit.questions.{$key}.options.{$answer}")), array_keys($question['answers']));
                $length += mb_strlen(__("audit.questions.{$key}.title")) + 2 + max($labels);
            }

            foreach (__('audit.result.dimensions') as $dimension) {
                $length += mb_strlen($dimension['title']) + 3 + max(array_map(mb_strlen(...), __('audit.result.levels')));
            }

            $this->assertLessThanOrEqual(1000, $length, $locale);
        }
    }

    public function test_sitemap_lists_the_new_pages(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/en/pricing</loc>', false)
            ->assertSee('/pl/audit</loc>', false)
            ->assertSee('/en/how-we-work</loc>', false)
            ->assertSee('/en/for-agencies</loc>', false)
            ->assertSee('/en/faq</loc>', false)
            ->assertSee('/en/industries</loc>', false)
            ->assertSee('/en/industries/ecommerce</loc>', false)
            ->assertSee('/en/services/automation-integrations</loc>', false);
    }

    public function test_contact_store_accepts_the_new_services_and_rejects_unknown_ones(): void
    {
        $manager = Mockery::mock(NotificationManager::class);
        $manager->shouldReceive('sendContactNotification')
            ->once()
            ->withArgs(fn (string $name, string $email, string $message): bool => str_contains($message, 'Fractional CTO') && str_contains($message, 'Agency Partnership'))
            ->andReturn(true);

        $this->app->instance(NotificationManager::class, $manager);

        $payload = ['name' => 'John Doe', 'email' => 'john@example.com', 'message' => 'Hello'];

        $this->postJson('/contact', [...$payload, 'services' => ['fractional-cto', 'agency-partner']])
            ->assertOk()
            ->assertJson(['ok' => true]);

        $this->postJson('/contact', [...$payload, 'services' => ['not-a-service']])
            ->assertStatus(422)
            ->assertJson(['ok' => false]);
    }

    public function test_contact_page_offers_the_new_services_as_chips(): void
    {
        $this->get('/en/contact')
            ->assertSee('value="fractional-cto"', false)
            ->assertSee('value="agency-partner"', false);
    }

    public function test_daily_rate_is_gone(): void
    {
        foreach (['/en', '/pl', '/en/contact', '/pl/contact', '/en/pricing', '/pl/pricing'] as $url) {
            $this->get($url)
                ->assertOk()
                ->assertDontSee('£500/day', false)
                ->assertDontSee('2000 zł/dzień', false);
        }
    }

    public function test_views_do_not_hardcode_amounts(): void
    {
        foreach (File::allFiles(resource_path('views')) as $view) {
            $this->assertSame(
                0,
                preg_match('/[£€]\s?\d|\d\s?zł/u', $view->getContents()),
                $view->getRelativePathname() . ' hardcodes an amount; use x-price and config/offer.php',
            );
        }
    }

    public function test_navigation_and_footer_link_the_new_pages(): void
    {
        $response = $this->get('/en/about')->assertOk();

        foreach (['/en/pricing', '/en/industries', '/en/how-we-work', '/en/faq', '/en/audit', '/en/for-agencies'] as $path) {
            $response->assertSee(url($path), false);
        }

        foreach (['custom-web-applications', 'api-development', 'automation-integrations', 'filament-admin-panels', 'legacy-modernization', 'technical-consulting'] as $slug) {
            $response->assertSee(url("/en/services/{$slug}"), false);
        }
    }

    public function test_home_links_each_package_and_project(): void
    {
        $response = $this->get('/en')->assertOk();

        foreach (array_keys(config('offer.packages')) as $package) {
            $response->assertSee(url('/en/pricing') . '#' . $package, false);
        }

        foreach (config('offer.home_projects') as $project) {
            $response->assertSee(url("/en/work/{$project}"), false);
        }

        $response->assertSee('https://github.com/laragod" target="_blank" rel="noopener"', false);
    }

    public function test_pricing_links_packages_to_prefilled_contact_and_care_to_configurator(): void
    {
        $response = $this->get('/en/pricing')->assertOk();

        $response->assertSee('id="configurator"', false);
        $response->assertSee('href="#configurator"', false);

        foreach (config('offer.packages') as $key => $package) {
            $response->assertSee('id="' . $key . '"', false);

            if ($key !== 'care') {
                $response->assertSee(url('/en/contact') . '?services=' . $package['service'], false);
            }
        }
    }

    public function test_agencies_and_faq_expose_valid_faq_schema(): void
    {
        foreach (['/en/for-agencies', '/pl/for-agencies', '/en/faq', '/pl/faq', '/en/services/automation-integrations'] as $url) {
            $schemas = $this->jsonLd($this->get($url)->assertOk()->getContent());
            $faq = array_values(array_filter($schemas, fn (array $schema): bool => $schema['@type'] === 'FAQPage'));

            $this->assertCount(1, $faq, $url);
            $this->assertNotEmpty($faq[0]['mainEntity'], $url);
            $this->assertSame('Answer', $faq[0]['mainEntity'][0]['acceptedAnswer']['@type'], $url);
        }

        $itemCount = array_sum(array_map(fn (array $group): int => count($group['items']), __('faq.groups')));

        foreach (Lang::get('services') as $section) {
            $itemCount += is_array($section) && isset($section['faq']) ? count($section['faq']) : 0;
        }

        $faqPage = array_values(array_filter($this->jsonLd($this->get('/en/faq')->getContent()), fn (array $schema): bool => $schema['@type'] === 'FAQPage'));

        $this->assertCount($itemCount, $faqPage[0]['mainEntity']);
    }

    public function test_service_schema_covers_uk_poland_and_eu(): void
    {
        $schemas = $this->jsonLd($this->get('/en/services/automation-integrations')->assertOk()->getContent());
        $service = array_values(array_filter($schemas, fn (array $schema): bool => $schema['@type'] === 'Service'))[0];

        $this->assertSame('Automation & Integrations', $service['name']);
        $this->assertSame(['United Kingdom', 'Poland', 'European Union'], array_column($service['areaServed'], 'name'));
    }

    public function test_industry_page_shows_its_project(): void
    {
        foreach (config('offer.industries') as $slug => $industry) {
            $this->get("/en/industries/{$slug}")
                ->assertOk()
                ->assertSee(url("/en/work/{$industry['project']}"), false);
        }
    }

    public function test_audit_page_passes_questions_in_config_order(): void
    {
        $html = $this->get('/en/audit')->assertOk()->getContent();

        $this->assertSame(1, preg_match('/const data = (\{.*?\});\n/s', $html, $match));

        $data = json_decode($match[1], true, flags: JSON_THROW_ON_ERROR);

        $this->assertSame(array_keys(config('offer.audit.questions')), array_column($data['questions'], 'key'));
        $this->assertSame(config('offer.audit.thresholds'), $data['thresholds']);
    }

    public function test_light_theme_is_the_default_and_a_labelled_toggle_is_present(): void
    {
        foreach (self::LOCALES as $locale) {
            $response = $this->get("/{$locale}")->assertOk();

            $response->assertDontSee('prefers-color-scheme', false);
            $response->assertSee('data-theme-toggle', false);
            $response->assertSee(Lang::get('nav.theme_dark', [], $locale));
            $response->assertSee(Lang::get('nav.theme_light', [], $locale));
        }
    }

    public function test_visitor_answers_never_travel_in_the_url(): void
    {
        foreach (['resources/views/audit.blade.php', 'resources/views/components/configurator.blade.php', 'resources/views/components/onboarding-form.blade.php'] as $view) {
            $source = File::get(base_path($view));

            $this->assertStringNotContainsString('notes=', $source, $view);
            $this->assertStringNotContainsString("get('notes')", $source, $view);
            $this->assertStringContainsString('LaragodContactNotes', $source, $view);
        }
    }

    public function test_contact_page_offers_budget_labels_in_every_currency(): void
    {
        $response = $this->get('/pl/contact')->assertOk();

        foreach (['25' . "\u{00A0}" . '000' . "\u{00A0}" . 'zł', '£5,000', '€6,000'] as $amount) {
            $response->assertSee($this->jsonEscaped($amount), false);
        }
    }

    public function test_about_page_shows_the_founder_block(): void
    {
        foreach (self::LOCALES as $locale) {
            $this->get("/{$locale}/about")
                ->assertOk()
                ->assertSee(Lang::get('about.founder.title', [], $locale));
        }
    }

    /**
     * The form receives its labels through @json, which escapes non-ASCII characters.
     */
    private function jsonEscaped(string $value): string
    {
        return trim(json_encode($value, JSON_THROW_ON_ERROR), '"');
    }

    /**
     * @param array<array-key, mixed> $translations
     * @return array<int, string>
     */
    private function keyPaths(array $translations, string $prefix = ''): array
    {
        $paths = [];

        foreach ($translations as $key => $value) {
            $path = $prefix . $key;
            $paths[] = $path;

            if (is_array($value)) {
                $paths = [...$paths, ...$this->keyPaths($value, $path . '.')];
            }
        }

        return $paths;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function jsonLd(string $html): array
    {
        preg_match_all('#<script type="application/ld\+json">(.*?)</script>#s', $html, $matches);

        return array_map(fn (string $json): array => json_decode($json, true, flags: JSON_THROW_ON_ERROR), $matches[1]);
    }
}
