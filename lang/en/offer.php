<?php

declare(strict_types=1);

return [
    'hero' => [
        'badge' => 'Pricing',
        'title_part1' => 'Prices you can see',
        'title_part2' => 'before you talk to anyone',
        'description' => 'Pick a starting point, or build your own monthly package below. You will know what it costs before the first call.',
    ],
    'currency_label' => 'Currency',
    'from' => 'from',
    'period' => [
        'once' => 'one-off',
        'month' => 'per month',
    ],
    'net_note' => 'All prices exclude VAT.',
    'best_for' => 'Best for',
    'measured_by' => 'How you will judge it',
    'packages' => [
        'audit' => [
            'title' => 'Audit',
            'tagline' => 'Find out where you really stand',
            'for' => 'Owners who inherited a system, doubt their supplier or are planning a big change.',
            'description' => 'A senior engineer reviews your code, servers and processes, then writes up what is wrong, what it could cost you and what to do first.',
            'includes' => [
                'Review of code, infrastructure and access',
                'Risks ranked by business impact',
                'Written 90-day action plan',
                'One call to walk through the findings',
            ],
            'measure' => 'A clear list of risks and a plan you could give to any developer, including someone other than us.',
            'cta' => 'Order an audit',
        ],
        'custom' => [
            'title' => 'Custom system',
            'tagline' => 'CRM, internal tool or integrations, built around your process',
            'for' => 'Companies that have outgrown spreadsheets or off-the-shelf tools.',
            'description' => 'It starts with a paid discovery workshop. You get a written scope and a fixed quote for the first version, and only then decide whether to build it.',
            'includes' => [
                'Discovery workshop and written scope',
                'Laravel and Filament, with tests from the start',
                'Integrations with your tools, using n8n or Make where that is enough',
                'Documentation and team handover',
            ],
            'measure' => 'Hours of manual work removed and a system your team actually uses.',
            'cta' => 'Book a discovery workshop',
        ],
        'care' => [
            'title' => 'Care',
            'tagline' => 'A monthly pool of senior hours',
            'for' => 'Companies with a live system that needs fixes, updates and small features.',
            'description' => 'Fixes, updates and new features from a pool of hours. You choose the size below and can change it as your needs change.',
            'includes' => [
                'Monthly pool of hours, rolling over for one month',
                'Staging environment and automated tests as standard',
                'Security and framework updates planned within your hours',
                'Monthly report of what shipped and what is at risk',
            ],
            'measure' => 'Changes shipped, uptime and open risks, all in a monthly report.',
            'cta' => 'Configure your package',
        ],
        'cto' => [
            'title' => 'Fractional CTO',
            'tagline' => 'Senior technical leadership without a full-time hire',
            'for' => 'Growing companies that make technical decisions without anyone senior to check them.',
            'description' => 'Regular sessions on architecture, hiring and your roadmap, plus code reviews and mentoring for your team.',
            'includes' => [
                '8 to 16 hours per month',
                'Architecture reviews and technology decisions',
                'Hiring support and developer interviews',
                'Roadmap aligned with your budget',
            ],
            'measure' => 'Fewer expensive technical surprises and a team that ships without you chasing it.',
            'cta' => 'Talk about CTO support',
        ],
    ],
    'included' => [
        'title' => 'On every project, at no extra charge',
        'description' => 'Some suppliers sell these as extras. We consider them the minimum for professional work.',
        'items' => [
            'Code, database and accounts in your name from day one',
            'Automated tests for what we build',
            'Static analysis and continuous integration',
            'A staging environment to check changes before they go live',
            'Documentation your next developer can use',
            'One named person responsible for your project',
        ],
    ],
    'configurator' => [
        'badge' => 'Configurator',
        'title' => 'Build your monthly package',
        'description' => 'Choose what you need and the total updates as you go. Copy the link to share it with your team.',
        'hours' => [
            'title' => 'Monthly pool of hours',
            'hint' => 'Unused hours roll over for one month.',
            'bonus' => '+:hours h free',
            'options' => [
                '5' => ['label' => '5 h', 'description' => 'Fixes and small changes'],
                '10' => ['label' => '10 h', 'description' => 'Steady improvements'],
                '20' => ['label' => '20 h', 'description' => 'Active development'],
                '40' => ['label' => '40 h', 'description' => 'A product that keeps growing'],
            ],
        ],
        'response' => [
            'title' => 'Response time',
            'hint' => 'Time to our first response, Monday to Friday, 9:00 to 18:00 UK time. We do not sell 24/7 cover, because we would not promise what we cannot keep.',
            'included' => 'included',
            'options' => [
                'standard' => ['label' => 'Standard', 'description' => 'Within 2 working days'],
                'priority' => ['label' => 'Priority', 'description' => 'Within 8 working hours'],
            ],
        ],
        'cto' => [
            'title' => 'Fractional CTO',
            'hint' => 'Technical leadership on top of your hours.',
            'options' => [
                'none' => ['label' => 'Not needed', 'description' => 'You can add it later'],
                'cto_8' => ['label' => '8 h per month', 'description' => 'Regular direction and reviews'],
                'cto_16' => ['label' => '16 h per month', 'description' => 'Hands-on leadership and team mentoring'],
            ],
        ],
        'addons' => [
            'title' => 'Monthly add-ons',
            'options' => [
                'integration_watch' => [
                    'label' => 'Integration watch',
                    'description' => 'When an outside service breaks your integration or automation (KSeF, BaseLinker, Stripe, n8n, Make), the repair does not use your hours.',
                ],
                'security_review' => [
                    'label' => 'Quarterly security review',
                    'description' => 'A written review of dependencies, access and configuration every three months.',
                ],
            ],
        ],
        'one_off' => [
            'title' => 'One-off services',
            'options' => [
                'data_migration' => [
                    'label' => 'Data clean-up and migration',
                    'description' => 'Moving spreadsheets, CSV files or an old system into your new database. Starting price; final quote depends on the data.',
                ],
                'single_fix' => [
                    'label' => 'Single fix',
                    'description' => 'One specific problem, up to half a day, with no subscription. Starting price.',
                ],
            ],
        ],
        'summary' => [
            'title' => 'Your package',
            'hours_line' => ':hours h per month',
            'hours_bonus_line' => ':hours h + :bonus h free per month',
            'monthly_total' => 'Monthly total',
            'one_off_total' => 'One-off, from',
            'term' => 'Month to month, with 30 days notice.',
            'start' => 'Start with this package',
            'copy_link' => 'Copy link',
            'copied' => 'Link copied',
            'contact_note' => 'Configured package',
        ],
    ],
    'faq_cta' => 'Have a question about pricing?',
    'cta' => [
        'heading' => 'Not sure which one you need?',
        'description' => 'Take the 10-question audit for a recommendation, or talk to us for 30 minutes, free of charge.',
        'audit' => 'Take the audit',
    ],
];
