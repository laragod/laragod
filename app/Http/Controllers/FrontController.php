<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class FrontController extends Controller
{
    public function home(): View|Factory
    {
        return view('home');
    }

    public function work(): View|Factory
    {
        $projects = [
            [
                'title' => __('work.projects.financial.title'),
                'slug' => 'financial-platform-modernization',
                'excerpt' => __('work.projects.financial.excerpt'),
                'description' => __('work.projects.financial.description'),
                'challenge' => __('work.projects.financial.challenge'),
                'solution' => __('work.projects.financial.solution'),
                'technologies' => ['Laravel 11', 'PHP 8.4', 'PostgreSQL', 'GitHub Actions', 'PHPStan', 'Pest'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            [
                'title' => __('work.projects.ecommerce.title'),
                'slug' => 'ecommerce-admin-panel',
                'excerpt' => __('work.projects.ecommerce.excerpt'),
                'description' => __('work.projects.ecommerce.description'),
                'challenge' => __('work.projects.ecommerce.challenge'),
                'solution' => __('work.projects.ecommerce.solution'),
                'technologies' => ['Laravel 12', 'Filament v4', 'MySQL', 'Vue.js', 'Stripe'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            [
                'title' => __('work.projects.api.title'),
                'slug' => 'api-integration-platform',
                'excerpt' => __('work.projects.api.excerpt'),
                'description' => __('work.projects.api.description'),
                'challenge' => __('work.projects.api.challenge'),
                'solution' => __('work.projects.api.solution'),
                'technologies' => ['Laravel 11', 'Redis', 'PostgreSQL', 'Stripe API', 'Xero API'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
            [
                'title' => __('work.projects.saas.title'),
                'slug' => 'saas-mvp-development',
                'excerpt' => __('work.projects.saas.excerpt'),
                'description' => __('work.projects.saas.description'),
                'challenge' => __('work.projects.saas.challenge'),
                'solution' => __('work.projects.saas.solution'),
                'technologies' => ['Laravel 12', 'Nuxt.js', 'TypeScript', 'Stripe', 'Tailwind CSS', 'PostgreSQL'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
        ];

        return view('work', ['projects' => $projects]);
    }

    public function about(): View|Factory
    {
        return view('about');
    }
}
