<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Industries We Build Software For — Laragod',
        'description' => 'Custom software for e-commerce, sport and recreation, culture and events. We only list industries we have actually shipped software for.',
    ],
    'hero' => [
        'badge' => 'Who we work with',
        'title_part1' => 'Industries we have',
        'title_part2' => 'actually worked in',
        'description' => 'We would rather show you three industries with real projects than a long list of logos. If yours is not here, talk to us anyway: the problems are often the same.',
    ],
    'labels' => [
        'see_more' => 'See how we can help',
        'pains' => 'What usually goes wrong',
        'solutions' => 'What we build',
        'project' => 'A project in this area',
        'view_project' => 'View project',
        'other_industries' => 'Other industries',
        'not_listed' => 'Your industry is not listed?',
        'not_listed_text' => 'Most businesses share the same issues: scattered tools, manual work and systems nobody dares to touch. Tell us about yours.',
    ],
    'items' => [
        'ecommerce' => [
            'title' => 'E-commerce',
            'excerpt' => 'For shops whose catalogue, fulfilment or integrations no longer fit a standard platform.',
            'meta_title' => 'Custom E-commerce Development with Laravel — Laragod',
            'meta_description' => 'Custom e-commerce systems, payments, stock and integrations built with Laravel, for shops that have outgrown standard platforms.',
            'hero_heading' => 'Shops that have outgrown a standard platform',
            'hero_description' => 'When plugins start fighting each other and your process no longer fits the template, it is time for a system built around how you sell.',
            'pains' => [
                'Plugins conflict after every update',
                'Stock, orders and invoices live in separate systems',
                'Your fulfilment process does not fit the platform',
                'Monthly fees grow with every feature you add',
                'The shop slows down when you most need it to be fast',
            ],
            'solutions' => [
                ['title' => 'Custom shop', 'description' => 'Catalogue, basket, checkout and payments built around your products.'],
                ['title' => 'Admin panel', 'description' => 'Orders, stock and content managed in one Filament panel.'],
                ['title' => 'Integrations', 'description' => 'Connections to payments, couriers, accounting and marketplaces.'],
                ['title' => 'Performance', 'description' => 'Speed work and monitoring, so the shop holds up at peak times.'],
            ],
        ],
        'sport-recreation' => [
            'title' => 'Sport and recreation',
            'excerpt' => 'For sport centres and clubs that need rankings, results and player data in one place.',
            'meta_title' => 'Software for Sport Centres and Clubs — Laragod',
            'meta_description' => 'Rankings, leaderboards, player profiles and centre management software for sport centres and clubs, built with Laravel.',
            'hero_heading' => 'Software for sport centres and clubs',
            'hero_description' => 'Results in spreadsheets and rankings nobody trusts do not keep players coming back. A proper system does.',
            'pains' => [
                'Results and rankings are kept in spreadsheets',
                'Each location keeps its own separate data',
                'Players cannot see their own progress',
                'Tournaments and leagues take hours of manual admin',
            ],
            'solutions' => [
                ['title' => 'Ranking engine', 'description' => 'Fair ratings and live leaderboards, built on rating systems we also maintain as open source.'],
                ['title' => 'Player profiles', 'description' => 'History, progress and results that give players a reason to return.'],
                ['title' => 'Centre management', 'description' => 'One panel for locations, staff, events and results.'],
                ['title' => 'API', 'description' => 'Connections to your booking system, website or mobile app.'],
            ],
        ],
        'culture-events' => [
            'title' => 'Culture and events',
            'excerpt' => 'For theatres and cultural organisations that want to update their own programme.',
            'meta_title' => 'Websites for Theatres and Cultural Organisations — Laragod',
            'meta_description' => 'Websites and event schedules for theatres and cultural organisations, built with Laravel and easy for your own team to update.',
            'hero_heading' => 'Websites for theatres and cultural organisations',
            'hero_description' => 'Your programme changes constantly. Your team should be able to update it without calling a developer.',
            'pains' => [
                'Each schedule change means asking a developer',
                'The site does not reflect the quality of your work',
                'Programme details live in several places',
                'The site is slow or awkward on a phone',
            ],
            'solutions' => [
                ['title' => 'Repertoire and schedule', 'description' => 'Performances and dates your team can manage alone.'],
                ['title' => 'Fast, elegant website', 'description' => 'A site that loads quickly and looks right on every device.'],
                ['title' => 'Easy editing', 'description' => 'A simple content structure that does not need developer help.'],
                ['title' => 'Search visibility', 'description' => 'Technical SEO, so people searching for your events can find you.'],
            ],
        ],
    ],
];
