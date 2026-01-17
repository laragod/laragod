<?php

declare(strict_types=1);

return [
    'hero' => [
        'badge' => 'Portfolio',
        'title_part1' => 'Our',
        'title_part2' => 'Work',
        'description' => 'Laravel applications built to last. Here\'s a taste of what we\'ve delivered for clients who value quality as much as we do.',
    ],
    'featured' => 'Featured',
    'challenge' => 'Challenge',
    'solution' => 'Solution',
    'code' => 'Code',
    'view_live' => 'View Live',
    'empty' => [
        'title' => 'Portfolio Coming Soon',
        'description' => 'We\'re currently adding our latest projects. In the meantime, let\'s talk about yours.',
        'cta' => 'Start a Conversation',
    ],
    'cta' => [
        'heading' => 'Want your project here?',
        'description' => 'Let\'s build something worth showcasing. Laravel applications that scale, perform, and are genuinely enjoyable to maintain.',
        'button' => 'Start Your Project',
    ],
    'projects' => [
        'financial' => [
            'title' => 'Financial Platform Modernization',
            'excerpt' => 'Migrated legacy PHP application to Laravel 11 with zero downtime, comprehensive test coverage, and improved performance.',
            'description' => 'Complete modernization of a financial services platform from legacy PHP 5.6 to Laravel 11.',
            'challenge' => 'Legacy codebase on PHP 5.6 with no tests, frequent production issues, and security vulnerabilities.',
            'solution' => 'Incremental migration to Laravel with comprehensive Pest test suite, PHPStan level 8, CI/CD pipeline, and zero downtime deployment.',
        ],
        'ecommerce' => [
            'title' => 'E-commerce Admin Panel',
            'excerpt' => 'Built custom Filament v4 admin panel for multi-vendor e-commerce platform with advanced inventory management.',
            'description' => 'Complete admin panel solution for managing products, orders, vendors, and inventory.',
            'challenge' => 'Off-the-shelf solutions couldn\'t handle complex multi-vendor workflows and inventory tracking requirements.',
            'solution' => 'Custom Filament v4 admin panel with tailored workflows, real-time inventory sync, and vendor portal integration.',
        ],
        'api' => [
            'title' => 'API Integration Platform',
            'excerpt' => 'Developed RESTful API integrating 15+ third-party services including Stripe, Xero, and HubSpot.',
            'description' => 'Centralized API platform connecting multiple business systems.',
            'challenge' => 'Client using 15+ disconnected SaaS tools, resulting in data inconsistencies and manual data entry.',
            'solution' => 'Laravel API with queued jobs, webhook handling, and comprehensive error logging for all integrations.',
        ],
        'saas' => [
            'title' => 'SaaS MVP Development',
            'excerpt' => 'Built production-ready SaaS MVP in 8 weeks with Stripe billing, team management, and API access.',
            'description' => 'Full-stack SaaS application from concept to launch.',
            'challenge' => 'Startup needed to validate product-market fit quickly without accumulating technical debt.',
            'solution' => 'Laravel 12 + Nuxt.js SaaS with Stripe subscriptions, team management, and comprehensive testing—built to scale.',
        ],
    ],
];
