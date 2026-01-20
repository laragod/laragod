<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Attributes\Sitemap;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class FrontController extends Controller
{
    /**
     * Get all service slugs for sitemap generation.
     *
     * @return array<int, string>
     */
    public static function getServiceSlugs(): array
    {
        return array_keys(self::getServicesData());
    }

    /**
     * Get all project slugs for sitemap generation.
     *
     * @return array<int, string>
     */
    public static function getProjectSlugs(): array
    {
        return array_keys(self::getProjectsData());
    }

    /**
     * Get all services with their metadata.
     *
     * @return array<string, array<string, mixed>>
     */
    private static function getServicesData(): array
    {
        return [
            'custom-web-applications' => [
                'key' => 'custom_web_apps',
                'icon' => 'code',
                'keywords' => ['custom laravel development', 'bespoke web application', 'custom business software'],
            ],
            'api-development' => [
                'key' => 'api_development',
                'icon' => 'terminal',
                'keywords' => ['laravel api development', 'api integration services', 'restful api'],
            ],
            'filament-admin-panels' => [
                'key' => 'laravel_filament',
                'icon' => 'layout',
                'keywords' => ['filament admin panel development', 'laravel admin panel', 'filament v4'],
            ],
            'mvp-development' => [
                'key' => 'mvp_development',
                'icon' => 'rocket',
                'keywords' => ['laravel mvp development', 'saas mvp', 'startup development'],
            ],
            'legacy-modernization' => [
                'key' => 'legacy_modernization',
                'icon' => 'refresh',
                'keywords' => ['legacy php migration', 'php upgrade', 'modernize php application'],
            ],
            'code-quality-audit' => [
                'key' => 'code_quality',
                'icon' => 'shield',
                'keywords' => ['laravel code review', 'php code audit', 'code quality improvement'],
            ],
            'technical-consulting' => [
                'key' => 'consulting',
                'icon' => 'users',
                'keywords' => ['fractional cto laravel', 'technical consulting', 'laravel consulting'],
            ],
            'devops-deployment' => [
                'key' => 'devops',
                'icon' => 'server',
                'keywords' => ['laravel devops', 'ci cd pipeline', 'deployment automation'],
            ],
            'team-augmentation' => [
                'key' => 'team_augmentation',
                'icon' => 'user-plus',
                'keywords' => ['hire laravel developer', 'laravel contractor', 'php developer uk'],
            ],
        ];
    }

    /**
     * Get all projects with their metadata.
     *
     * @return array<string, array<string, mixed>>
     */
    private static function getProjectsData(): array
    {
        return [
            'financial-platform-modernization' => [
                'key' => 'financial',
                'technologies' => ['Laravel 11', 'PHP 8.4', 'PostgreSQL', 'GitHub Actions', 'PHPStan', 'Pest'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            'ecommerce-admin-panel' => [
                'key' => 'ecommerce',
                'technologies' => ['Laravel 12', 'Filament v4', 'MySQL', 'Vue.js', 'Stripe'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            'api-integration-platform' => [
                'key' => 'api',
                'technologies' => ['Laravel 11', 'Redis', 'PostgreSQL', 'Stripe API', 'Xero API'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
            'saas-mvp-development' => [
                'key' => 'saas',
                'technologies' => ['Laravel 12', 'Nuxt.js', 'TypeScript', 'Stripe', 'Tailwind CSS', 'PostgreSQL'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
        ];
    }

    #[Sitemap(priority: 1.0, changefreq: 'weekly')]
    public function home(): View|Factory
    {
        return view('home');
    }

    #[Sitemap(priority: 0.9, changefreq: 'weekly')]
    public function services(): View|Factory
    {
        return view('services.index', ['services' => self::getServicesData()]);
    }

    #[Sitemap(priority: 0.8, changefreq: 'monthly', slugsMethod: 'getServiceSlugs')]
    public function service(string $locale, string $slug): View|Factory
    {
        $services = self::getServicesData();
        abort_unless(isset($services[$slug]), 404);

        return view('services.show', [
            'service' => $services[$slug],
            'slug' => $slug,
            'allServices' => $services,
        ]);
    }

    #[Sitemap(priority: 0.8, changefreq: 'weekly')]
    public function work(): View|Factory
    {
        $projectsData = self::getProjectsData();
        $projects = [];

        foreach ($projectsData as $slug => $data) {
            $projects[] = [
                'title' => __("work.projects.{$data['key']}.title"),
                'slug' => $slug,
                'excerpt' => __("work.projects.{$data['key']}.excerpt"),
                'description' => __("work.projects.{$data['key']}.description"),
                'challenge' => __("work.projects.{$data['key']}.challenge"),
                'solution' => __("work.projects.{$data['key']}.solution"),
                'technologies' => $data['technologies'],
                'image' => $data['image'],
                'github_url' => $data['github_url'],
                'live_url' => $data['live_url'],
                'featured' => $data['featured'],
                'completed_at' => $data['completed_at'],
            ];
        }

        return view('work', ['projects' => $projects]);
    }

    #[Sitemap(priority: 0.7, changefreq: 'monthly', slugsMethod: 'getProjectSlugs')]
    public function project(string $locale, string $slug): View|Factory
    {
        $projects = self::getProjectsData();
        abort_unless(isset($projects[$slug]), 404);

        $data = $projects[$slug];

        $project = [
            'title' => __("work.projects.{$data['key']}.title"),
            'slug' => $slug,
            'excerpt' => __("work.projects.{$data['key']}.excerpt"),
            'description' => __("work.projects.{$data['key']}.description"),
            'challenge' => __("work.projects.{$data['key']}.challenge"),
            'solution' => __("work.projects.{$data['key']}.solution"),
            'technologies' => $data['technologies'],
            'image' => $data['image'],
            'github_url' => $data['github_url'],
            'live_url' => $data['live_url'],
            'featured' => $data['featured'],
            'completed_at' => $data['completed_at'],
        ];

        return view('work.show', [
            'project' => $project,
            'slug' => $slug,
            'allProjects' => $projects,
        ]);
    }

    #[Sitemap(priority: 0.8, changefreq: 'monthly')]
    public function about(): View|Factory
    {
        return view('about');
    }
}
