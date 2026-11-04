<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Laragod\Toolkit\Attributes\Sitemap;

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
     * Get all industry slugs for sitemap generation.
     *
     * @return array<int, string>
     */
    public static function getIndustrySlugs(): array
    {
        return array_keys(self::getIndustriesData());
    }

    /**
     * Get all industries with their showcase project.
     *
     * @return array<string, array{project: string}>
     */
    private static function getIndustriesData(): array
    {
        /** @var array<string, array{project: string}> */
        return config('offer.industries');
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
            'automation-integrations' => [
                'key' => 'automation',
                'icon' => 'refresh',
                'keywords' => ['n8n automation', 'make automation', 'business process automation'],
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
            'siege-forge' => [
                'key' => 'siege_forge',
                'technologies' => ['Laravel', 'PHP 8.4', 'Machine Learning', 'Tailwind CSS', 'MySQL', 'REST API'],
                'image' => '/images/projects/siege-forge.svg',
                'github_url' => null,
                'live_url' => 'https://siege.laragod.com',
                'featured' => true,
                'completed_at' => '2026',
            ],
            'skill-peak' => [
                'key' => 'skill_peak',
                'technologies' => ['Laravel', 'Filament', 'PHP 8.4', 'Tailwind CSS', 'MySQL', 'REST API'],
                'image' => '/images/projects/skill-peak.svg',
                'github_url' => null,
                'live_url' => 'https://skill-peak.com',
                'featured' => true,
                'completed_at' => '2025–2026',
            ],
            'lunaris' => [
                'key' => 'lunaris',
                'technologies' => ['Laravel', 'Filament', 'PHP 8.4', 'MySQL', 'Stripe', 'Tailwind CSS'],
                'image' => '/images/projects/lunaris.svg',
                'github_url' => null,
                'live_url' => 'https://lunaris.pl',
                'featured' => true,
                'completed_at' => '2026',
            ],
            'dofus-temple' => [
                'key' => 'dofus_temple',
                'technologies' => ['Laravel', 'Filament', 'PHP 8.4', 'SEO', 'Tailwind CSS', 'MySQL'],
                'image' => '/images/projects/dofus-temple.svg',
                'github_url' => null,
                'live_url' => 'https://dofus-temple.com',
                'featured' => false,
                'completed_at' => '2020–2025',
            ],
            'adriateatr' => [
                'key' => 'adriateatr',
                'technologies' => ['Laravel', 'PHP 8.1', 'Tailwind CSS', 'MySQL'],
                'image' => '/images/projects/adriateatr.svg',
                'github_url' => null,
                'live_url' => 'https://adriateatr.pl',
                'featured' => false,
                'completed_at' => '2023',
            ],
            'persiu-studio' => [
                'key' => 'persiu_studio',
                'technologies' => ['Laravel', 'PHP 8.4', 'Tailwind CSS', 'Three.js'],
                'image' => '/images/projects/persiu-studio.svg',
                'github_url' => null,
                'live_url' => 'https://persiustudio.pl',
                'featured' => false,
                'completed_at' => '2026',
            ],
            'laragod' => [
                'key' => 'laragod',
                'technologies' => ['Laravel 12', 'PHP 8.4', 'Tailwind CSS 4', 'Blade'],
                'image' => '/images/projects/laragod.svg',
                'github_url' => 'https://github.com/laragod/laragod',
                'live_url' => 'https://laragod.com',
                'featured' => false,
                'completed_at' => '2023–2026',
            ],
        ];
    }

    /**
     * Get the localized summary of a project shown outside the portfolio pages.
     *
     * @return array<string, mixed>
     */
    private function getProjectSummary(string $slug): array
    {
        $data = self::getProjectsData()[$slug];

        /** @var string $key */
        $key = $data['key'];

        return [
            'slug' => $slug,
            'title' => __(sprintf('work.projects.%s.title', $key)),
            'excerpt' => __(sprintf('work.projects.%s.excerpt', $key)),
            'technologies' => $data['technologies'],
        ];
    }

    #[Sitemap(priority: 1.0, changefreq: 'weekly')]
    public function home(): View|Factory
    {
        /** @var array<int, string> $slugs */
        $slugs = config('offer.home_projects');

        return view('home', [
            'projects' => array_map($this->getProjectSummary(...), $slugs),
        ]);
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
            /** @var string $key */
            $key = $data['key'];

            $projects[] = [
                'title' => __(sprintf('work.projects.%s.title', $key)),
                'slug' => $slug,
                'excerpt' => __(sprintf('work.projects.%s.excerpt', $key)),
                'description' => __(sprintf('work.projects.%s.description', $key)),
                'challenge' => __(sprintf('work.projects.%s.challenge', $key)),
                'solution' => __(sprintf('work.projects.%s.solution', $key)),
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

        /** @var string $key */
        $key = $data['key'];

        $project = [
            'title' => __(sprintf('work.projects.%s.title', $key)),
            'slug' => $slug,
            'excerpt' => __(sprintf('work.projects.%s.excerpt', $key)),
            'description' => __(sprintf('work.projects.%s.description', $key)),
            'challenge' => __(sprintf('work.projects.%s.challenge', $key)),
            'solution' => __(sprintf('work.projects.%s.solution', $key)),
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

    #[Sitemap(priority: 0.9, changefreq: 'monthly')]
    public function pricing(): View|Factory
    {
        return view('pricing');
    }

    #[Sitemap(priority: 0.7, changefreq: 'monthly')]
    public function process(): View|Factory
    {
        return view('process');
    }

    #[Sitemap(priority: 0.7, changefreq: 'monthly')]
    public function agencies(): View|Factory
    {
        return view('agencies');
    }

    #[Sitemap(priority: 0.8, changefreq: 'monthly')]
    public function audit(): View|Factory
    {
        return view('audit');
    }

    #[Sitemap(priority: 0.7, changefreq: 'monthly')]
    public function faq(): View|Factory
    {
        return view('faq', ['services' => self::getServicesData()]);
    }

    #[Sitemap(priority: 0.8, changefreq: 'monthly')]
    public function industries(): View|Factory
    {
        return view('industries.index');
    }

    #[Sitemap(priority: 0.7, changefreq: 'monthly', slugsMethod: 'getIndustrySlugs')]
    public function industry(string $locale, string $slug): View|Factory
    {
        $industries = self::getIndustriesData();
        abort_unless(isset($industries[$slug]), 404);

        return view('industries.show', [
            'slug' => $slug,
            'project' => $this->getProjectSummary($industries[$slug]['project']),
            'otherSlugs' => array_values(array_diff(array_keys($industries), [$slug])),
        ]);
    }
}
