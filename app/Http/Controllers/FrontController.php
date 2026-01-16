<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

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
                'title' => 'Financial Platform Modernization',
                'slug' => 'financial-platform-modernization',
                'excerpt' => 'Migrated legacy PHP application to Laravel 11 with zero downtime, comprehensive test coverage, and improved performance.',
                'description' => 'Complete modernization of a financial services platform from legacy PHP 5.6 to Laravel 11.',
                'challenge' => 'Legacy codebase on PHP 5.6 with no tests, frequent production issues, and security vulnerabilities.',
                'solution' => 'Incremental migration to Laravel with comprehensive Pest test suite, PHPStan level 8, CI/CD pipeline, and zero downtime deployment.',
                'technologies' => ['Laravel 11', 'PHP 8.4', 'PostgreSQL', 'GitHub Actions', 'PHPStan', 'Pest'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            [
                'title' => 'E-commerce Admin Panel',
                'slug' => 'ecommerce-admin-panel',
                'excerpt' => 'Built custom Filament v4 admin panel for multi-vendor e-commerce platform with advanced inventory management.',
                'description' => 'Complete admin panel solution for managing products, orders, vendors, and inventory.',
                'challenge' => "Off-the-shelf solutions couldn't handle complex multi-vendor workflows and inventory tracking requirements.",
                'solution' => 'Custom Filament v4 admin panel with tailored workflows, real-time inventory sync, and vendor portal integration.',
                'technologies' => ['Laravel 12', 'Filament v4', 'MySQL', 'Vue.js', 'Stripe'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'completed_at' => '2025',
            ],
            [
                'title' => 'API Integration Platform',
                'slug' => 'api-integration-platform',
                'excerpt' => 'Developed RESTful API integrating 15+ third-party services including Stripe, Xero, and HubSpot.',
                'description' => 'Centralized API platform connecting multiple business systems.',
                'challenge' => 'Client using 15+ disconnected SaaS tools, resulting in data inconsistencies and manual data entry.',
                'solution' => 'Laravel API with queued jobs, webhook handling, and comprehensive error logging for all integrations.',
                'technologies' => ['Laravel 11', 'Redis', 'PostgreSQL', 'Stripe API', 'Xero API'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
            [
                'title' => 'SaaS MVP Development',
                'slug' => 'saas-mvp-development',
                'excerpt' => 'Built production-ready SaaS MVP in 8 weeks with Stripe billing, team management, and API access.',
                'description' => 'Full-stack SaaS application from concept to launch.',
                'challenge' => 'Startup needed to validate product-market fit quickly without accumulating technical debt.',
                'solution' => 'Laravel 12 + Nuxt.js SaaS with Stripe subscriptions, team management, and comprehensive testing—built to scale.',
                'technologies' => ['Laravel 12', 'Nuxt.js', 'TypeScript', 'Stripe', 'Tailwind CSS', 'PostgreSQL'],
                'image' => null,
                'github_url' => null,
                'live_url' => null,
                'featured' => false,
                'completed_at' => '2024',
            ],
        ];

        return view('work', compact('projects'));
    }

    public function about(): View|Factory
    {
        return view('about');
    }
}
