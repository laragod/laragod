<?php

declare(strict_types=1);

return [
    // Meta & Page Structure
    'meta' => [
        'title' => 'Laravel Development Services | Laragod',
        'description' => 'Professional Laravel development services including custom web applications, API development, Filament admin panels, MVP development, and legacy modernization.',
    ],
    'hero' => [
        'badge' => 'Our Services',
        'title_part1' => 'Laravel Development',
        'title_part2' => 'Services',
        'description' => 'From custom web applications to legacy modernization, we deliver Laravel solutions that scale with your business. No templates, no shortcuts.',
    ],
    'learn_more' => 'Learn more',
    'get_started' => 'Get Started',
    'problems_title' => 'Sound Familiar?',
    'faq_title' => 'Frequently Asked Questions',
    'other_services' => 'Other Services',
    'cta' => [
        'heading' => 'Ready to Start Your Project?',
        'description' => 'Let\'s discuss how we can help you build software that actually works for your business.',
    ],

    // Individual Services
    'custom_web_apps' => [
        'title' => 'Custom Web Applications',
        'description' => 'Bespoke Laravel applications built from scratch, tailored to your exact business requirements. No templates, no compromises.',
        'meta_title' => 'Custom Web Application Development | Laravel Agency | Laragod',
        'meta_description' => 'Custom Laravel web applications built to your exact specifications. Bespoke business software that scales with your growth. UK-based Laravel development agency.',
        'hero_heading' => 'Custom Web Applications Built for Your Business',
        'hero_description' => 'Off-the-shelf software forces you to adapt your processes to its limitations. We build software that adapts to you.',
        'problems' => [
            'Off-the-shelf software doesn\'t fit your workflow',
            'You\'re duct-taping multiple tools together with manual processes',
            'Your team wastes hours on workarounds and data re-entry',
            'You\'ve outgrown spreadsheets but nothing else quite fits',
        ],
        'approach' => [
            'title' => 'How We Build Custom Applications',
            'steps' => [
                [
                    'title' => 'Discovery & Requirements',
                    'description' => 'We dig deep into your business processes, pain points, and goals. No assumptions - just understanding what you actually need.',
                ],
                [
                    'title' => 'Architecture & Planning',
                    'description' => 'We design a solution that fits your requirements while leaving room for future growth. You\'ll see the full plan before we write any code.',
                ],
                [
                    'title' => 'Iterative Development',
                    'description' => 'Regular demos and feedback loops ensure we\'re building exactly what you need. No surprises at launch.',
                ],
                [
                    'title' => 'Testing & Launch',
                    'description' => 'Comprehensive testing, smooth deployment, and knowledge transfer. Your team will be confident from day one.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'How long does it take to build a custom web application?',
                'answer' => 'Most projects take 2-4 months depending on complexity. We can scope an MVP in as little as 6-8 weeks if speed to market is critical.',
            ],
            [
                'question' => 'What if my requirements change during development?',
                'answer' => 'Requirements evolve - that\'s normal. Our iterative approach allows for adjustments without derailing the project. We discuss scope changes transparently.',
            ],
            [
                'question' => 'Will I own the code?',
                'answer' => 'Yes, absolutely. You own 100% of the code we write for you. No licensing fees, no lock-in.',
            ],
        ],
    ],

    'api_development' => [
        'title' => 'API Development & Integration',
        'description' => 'RESTful APIs, GraphQL, third-party integrations. Connect your systems seamlessly with payment gateways, CRMs, and more.',
        'meta_title' => 'API Development & Integration Services | Laravel | Laragod',
        'meta_description' => 'Expert Laravel API development and system integration. RESTful APIs, GraphQL, third-party integrations with Stripe, Xero, HubSpot, and more.',
        'hero_heading' => 'Connect Your Systems with Robust APIs',
        'hero_description' => 'Stop copying data between systems. We build APIs that make your tools work together automatically.',
        'problems' => [
            'Your systems don\'t talk to each other',
            'Staff spend hours on manual data entry between platforms',
            'You can\'t get a single source of truth across your tools',
            'Third-party integrations are flaky or non-existent',
        ],
        'approach' => [
            'title' => 'Our API Development Process',
            'steps' => [
                [
                    'title' => 'Integration Audit',
                    'description' => 'We map your current systems, identify integration points, and document data flows that need to be automated.',
                ],
                [
                    'title' => 'API Design',
                    'description' => 'Clear, documented API design following REST or GraphQL best practices. You\'ll know exactly what each endpoint does.',
                ],
                [
                    'title' => 'Build & Connect',
                    'description' => 'We build robust integrations with proper error handling, retry logic, and monitoring.',
                ],
                [
                    'title' => 'Documentation & Handoff',
                    'description' => 'Comprehensive API documentation ensures your team (or future developers) can work with the system confidently.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'Which third-party services can you integrate with?',
                'answer' => 'If it has an API, we can integrate it. We have experience with Stripe, Xero, QuickBooks, HubSpot, Salesforce, Mailchimp, and many more.',
            ],
            [
                'question' => 'Do you build APIs for mobile apps?',
                'answer' => 'Yes. We build mobile-friendly APIs that work great with iOS, Android, and React Native applications.',
            ],
            [
                'question' => 'How do you handle API security?',
                'answer' => 'Security is built in from the start: OAuth 2.0, API tokens, rate limiting, input validation, and encryption for sensitive data.',
            ],
        ],
    ],

    'laravel_filament' => [
        'title' => 'Laravel + Filament Admin Panels',
        'description' => 'Powerful, beautiful admin panels with Filament. Manage your application with ease and give your team the tools they deserve.',
        'meta_title' => 'Filament Admin Panel Development | Laravel | Laragod',
        'meta_description' => 'Custom Filament admin panels for Laravel applications. Beautiful, powerful admin interfaces that your team will love using.',
        'hero_heading' => 'Admin Panels Your Team Will Actually Enjoy',
        'hero_description' => 'Filament makes it possible to build admin panels that are both powerful and pleasant to use. We make it happen.',
        'problems' => [
            'Your current admin interface is clunky and frustrating',
            'Basic CRUD operations take way too many clicks',
            'You need custom workflows but your admin can\'t handle them',
            'Your team avoids using the admin because it\'s too complicated',
        ],
        'approach' => [
            'title' => 'Building Better Admin Panels',
            'steps' => [
                [
                    'title' => 'Workflow Analysis',
                    'description' => 'We observe how your team actually works and identify the most common tasks that need to be optimized.',
                ],
                [
                    'title' => 'Interface Design',
                    'description' => 'Custom layouts, navigation, and dashboards designed around your actual workflows - not generic templates.',
                ],
                [
                    'title' => 'Filament Development',
                    'description' => 'We leverage Filament\'s powerful features to build custom resources, actions, and widgets.',
                ],
                [
                    'title' => 'Training & Refinement',
                    'description' => 'We train your team and gather feedback to refine the interface until it fits like a glove.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'Why Filament instead of building from scratch?',
                'answer' => 'Filament provides a solid foundation with excellent UX patterns. Building on Filament lets us focus on your custom requirements instead of reinventing basic functionality.',
            ],
            [
                'question' => 'Can you customize the look and feel?',
                'answer' => 'Absolutely. We can match your brand colors, add custom components, and create bespoke layouts. It won\'t look like a generic admin template.',
            ],
            [
                'question' => 'Do you work with existing Laravel applications?',
                'answer' => 'Yes. We can add Filament to existing Laravel projects or build new applications with Filament from the start.',
            ],
        ],
    ],

    'mvp_development' => [
        'title' => 'MVP Development',
        'description' => 'Launch fast without cutting corners. We build MVPs that can actually scale when your business takes off.',
        'meta_title' => 'MVP Development Services | Laravel SaaS | Laragod',
        'meta_description' => 'Fast MVP development with Laravel. Launch your SaaS product quickly with solid architecture that scales. No technical debt shortcuts.',
        'hero_heading' => 'Launch Your MVP Without the Technical Debt',
        'hero_description' => 'Speed to market matters, but so does not having to rebuild everything in 6 months. We do both.',
        'problems' => [
            'You need to validate your idea but can\'t afford a full build',
            'Previous MVPs became unmaintainable messes',
            'You\'re worried about cutting corners that will hurt you later',
            'Agencies promise fast delivery but the code quality is awful',
        ],
        'approach' => [
            'title' => 'MVP Development Done Right',
            'steps' => [
                [
                    'title' => 'Feature Prioritization',
                    'description' => 'We help you identify the core features that will validate your hypothesis. Everything else can wait.',
                ],
                [
                    'title' => 'Architecture for Scale',
                    'description' => 'Even MVPs need good architecture. We build foundations that can handle growth without rewrites.',
                ],
                [
                    'title' => 'Rapid Development',
                    'description' => 'Focused sprints, daily progress updates, and quick iterations. You\'ll see your product come together fast.',
                ],
                [
                    'title' => 'Launch Support',
                    'description' => 'We don\'t disappear after launch. We help you handle the initial rush and plan the next phase.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'What\'s the typical timeline for an MVP?',
                'answer' => 'Most MVPs take 6-10 weeks depending on scope. We\'ll give you a realistic timeline after understanding your requirements.',
            ],
            [
                'question' => 'Will the MVP code need to be rewritten later?',
                'answer' => 'No. We write production-quality code from day one. The MVP might have fewer features, but the code is solid and maintainable.',
            ],
            [
                'question' => 'Can you help with product decisions, not just development?',
                'answer' => 'Yes. We\'ve helped launch multiple SaaS products and can advise on feature prioritization, pricing, and go-to-market strategy.',
            ],
        ],
    ],

    'legacy_modernization' => [
        'title' => 'Legacy Code Modernization',
        'description' => 'Stuck on an older PHP version? We migrate and modernize legacy applications to current Laravel versions with comprehensive testing.',
        'meta_title' => 'Legacy PHP Modernization | Laravel Migration | Laragod',
        'meta_description' => 'Modernize your legacy PHP application. Safe migration to Laravel with comprehensive testing and zero-downtime deployment.',
        'hero_heading' => 'Modernize Your Legacy PHP Application',
        'hero_description' => 'That old codebase isn\'t going away on its own. We migrate legacy applications to modern Laravel without disrupting your business.',
        'problems' => [
            'Your application is stuck on PHP 5.x or early PHP 7',
            'Simple changes take forever because the code is fragile',
            'You can\'t find developers who want to work on it',
            'Security vulnerabilities are piling up',
        ],
        'approach' => [
            'title' => 'Safe Migration to Modern Laravel',
            'steps' => [
                [
                    'title' => 'Codebase Assessment',
                    'description' => 'We analyze your existing code to understand dependencies, identify risks, and create a migration roadmap.',
                ],
                [
                    'title' => 'Test Coverage',
                    'description' => 'Before changing anything, we add tests to ensure existing functionality is preserved during migration.',
                ],
                [
                    'title' => 'Incremental Migration',
                    'description' => 'We migrate in stages, keeping your application running throughout. No big-bang deployments.',
                ],
                [
                    'title' => 'Verification & Handoff',
                    'description' => 'Comprehensive testing, documentation, and training to ensure your team can maintain the modernized codebase.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'Can we keep the application running during migration?',
                'answer' => 'Yes. Our incremental approach ensures your application stays operational throughout the migration process.',
            ],
            [
                'question' => 'How long does a legacy migration typically take?',
                'answer' => 'It depends on the codebase size and complexity. Most migrations take 3-6 months. We\'ll give you a realistic estimate after assessment.',
            ],
            [
                'question' => 'What if we want to add new features during migration?',
                'answer' => 'We can accommodate new features, but we recommend completing the migration first to avoid complications. We\'ll discuss the trade-offs.',
            ],
        ],
    ],

    'code_quality' => [
        'title' => 'Code Quality & Standardization',
        'description' => 'PHPStan, Pint, Rector, comprehensive testing. We improve developer experience and set your team up for sustainable growth.',
        'meta_title' => 'Laravel Code Quality Audit & Improvement | Laragod',
        'meta_description' => 'Improve your Laravel codebase quality with PHPStan, Pest testing, Pint formatting, and architectural improvements.',
        'hero_heading' => 'Code Quality That Actually Makes a Difference',
        'hero_description' => 'Good code quality isn\'t about perfection - it\'s about making your codebase a pleasure to work with.',
        'problems' => [
            'New developers take forever to get productive',
            'Bugs keep appearing in code that "worked fine"',
            'Different parts of the codebase follow different conventions',
            'Nobody wants to touch certain parts of the code',
        ],
        'approach' => [
            'title' => 'Improving Code Quality Systematically',
            'steps' => [
                [
                    'title' => 'Code Audit',
                    'description' => 'We analyze your codebase using static analysis tools and manual review to identify the biggest pain points.',
                ],
                [
                    'title' => 'Tool Setup',
                    'description' => 'We configure PHPStan, Pint, and other tools to enforce standards automatically via CI/CD.',
                ],
                [
                    'title' => 'Test Coverage',
                    'description' => 'We add tests to critical paths and set up a testing workflow that developers will actually follow.',
                ],
                [
                    'title' => 'Team Training',
                    'description' => 'We train your team on the new tools and practices so the improvements stick.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'What tools do you typically recommend?',
                'answer' => 'PHPStan for static analysis, Pint for code style, Pest for testing, and Rector for automated refactoring. The exact setup depends on your needs.',
            ],
            [
                'question' => 'Will this slow down our development?',
                'answer' => 'Short-term, there\'s a learning curve. Long-term, your team will move faster because they catch bugs earlier and spend less time debugging.',
            ],
            [
                'question' => 'Can you work with our existing CI/CD pipeline?',
                'answer' => 'Absolutely. We integrate with GitHub Actions, GitLab CI, Bitbucket Pipelines, and most other CI/CD systems.',
            ],
        ],
    ],

    'consulting' => [
        'title' => 'Technical Consulting / Fractional CTO',
        'description' => 'Strategic technical guidance without the full-time hire. Architecture reviews, team mentoring, and roadmap planning.',
        'meta_title' => 'Fractional CTO & Technical Consulting | Laravel | Laragod',
        'meta_description' => 'Strategic technical guidance for growing businesses. Architecture reviews, team mentoring, and technology roadmap planning.',
        'hero_heading' => 'Strategic Technical Guidance When You Need It',
        'hero_description' => 'Get senior technical leadership without the full-time commitment. We help you make better technology decisions.',
        'problems' => [
            'You need senior technical input but can\'t justify a full-time CTO',
            'Your development team needs guidance on architecture decisions',
            'You\'re not sure if your technology choices are right',
            'Technical debt is accumulating but nobody owns the problem',
        ],
        'approach' => [
            'title' => 'How Fractional CTO Engagement Works',
            'steps' => [
                [
                    'title' => 'Initial Assessment',
                    'description' => 'We review your current technology stack, team capabilities, and business goals to understand where help is needed most.',
                ],
                [
                    'title' => 'Regular Engagement',
                    'description' => 'Weekly or bi-weekly sessions to review progress, discuss decisions, and provide guidance on technical challenges.',
                ],
                [
                    'title' => 'Team Development',
                    'description' => 'We mentor your developers, conduct code reviews, and help level up your team\'s skills.',
                ],
                [
                    'title' => 'Strategic Planning',
                    'description' => 'We help create technology roadmaps aligned with your business goals and budget constraints.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'How much time is typically needed?',
                'answer' => 'Most engagements are 8-16 hours per month. We can scale up or down based on your needs and budget.',
            ],
            [
                'question' => 'Can you help hire developers?',
                'answer' => 'Yes. We can help write job descriptions, screen candidates, conduct technical interviews, and onboard new team members.',
            ],
            [
                'question' => 'Do you work with non-Laravel projects?',
                'answer' => 'Our expertise is in Laravel/PHP, but we can advise on broader technology decisions and team processes regardless of stack.',
            ],
        ],
    ],

    'devops' => [
        'title' => 'DevOps & Deployment',
        'description' => 'CI/CD pipelines, hosting setup, performance optimization. We handle the infrastructure so you can focus on your business.',
        'meta_title' => 'Laravel DevOps & Deployment Services | Laragod',
        'meta_description' => 'Professional DevOps services for Laravel applications. CI/CD pipelines, hosting setup, performance optimization, and monitoring.',
        'hero_heading' => 'Reliable Infrastructure for Your Laravel Application',
        'hero_description' => 'Stop worrying about deployments and server issues. We set up infrastructure that just works.',
        'problems' => [
            'Deployments are manual and error-prone',
            'You\'re not sure if your hosting setup is right',
            'Performance issues appear randomly and are hard to diagnose',
            'Your team spends too much time on infrastructure instead of features',
        ],
        'approach' => [
            'title' => 'Setting Up Solid Infrastructure',
            'steps' => [
                [
                    'title' => 'Infrastructure Review',
                    'description' => 'We assess your current setup, identify bottlenecks, and recommend improvements.',
                ],
                [
                    'title' => 'CI/CD Pipeline',
                    'description' => 'Automated testing and deployment so every push is verified and deployments are one-click.',
                ],
                [
                    'title' => 'Hosting & Scaling',
                    'description' => 'We set up or optimize your hosting environment for performance, reliability, and cost efficiency.',
                ],
                [
                    'title' => 'Monitoring & Alerts',
                    'description' => 'Proper logging, error tracking, and alerting so you know about problems before your users do.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'Which hosting providers do you work with?',
                'answer' => 'We work with Laravel Forge, AWS, DigitalOcean, Vapor, and traditional VPS providers. We\'ll recommend what fits your needs and budget.',
            ],
            [
                'question' => 'Can you manage our infrastructure ongoing?',
                'answer' => 'Yes, we offer ongoing maintenance packages. Or we can set things up and hand off to your team with documentation.',
            ],
            [
                'question' => 'How do you handle zero-downtime deployments?',
                'answer' => 'We use blue-green deployments or rolling updates depending on your infrastructure. Your users won\'t notice deployments happening.',
            ],
        ],
    ],

    'team_augmentation' => [
        'title' => 'Team Augmentation',
        'description' => 'Join your dev team short-term. We match your pace, adopt your tools, and deliver without the HR overhead.',
        'meta_title' => 'Laravel Developer Team Augmentation | UK | Laragod',
        'meta_description' => 'Hire experienced Laravel developers to augment your team. Flexible engagement, no long-term commitment, UK-based.',
        'hero_heading' => 'Experienced Laravel Developers, On Your Team',
        'hero_description' => 'Need extra hands without the hiring hassle? We integrate with your team and deliver from day one.',
        'problems' => [
            'You have more work than your current team can handle',
            'Hiring full-time developers takes too long',
            'You need specific Laravel expertise your team doesn\'t have',
            'Short-term project needs don\'t justify permanent hires',
        ],
        'approach' => [
            'title' => 'How Team Augmentation Works',
            'steps' => [
                [
                    'title' => 'Understand Your Needs',
                    'description' => 'We learn about your project, team culture, and what kind of support you need.',
                ],
                [
                    'title' => 'Quick Onboarding',
                    'description' => 'We get up to speed on your codebase, tools, and processes. Typically productive within the first week.',
                ],
                [
                    'title' => 'Integrated Delivery',
                    'description' => 'We work within your existing workflows - attending standups, using your tools, following your conventions.',
                ],
                [
                    'title' => 'Knowledge Transfer',
                    'description' => 'When the engagement ends, we ensure your team can maintain everything we\'ve built.',
                ],
            ],
        ],
        'faq' => [
            [
                'question' => 'What\'s the minimum engagement length?',
                'answer' => 'We typically work on a month-to-month basis with a two-week notice period. No long-term contracts required.',
            ],
            [
                'question' => 'How do you handle time zones?',
                'answer' => 'We\'re UK-based with flexible hours. We overlap with European and North American time zones and can adjust for standups.',
            ],
            [
                'question' => 'Will you use our project management tools?',
                'answer' => 'Yes. We adapt to your tools and processes, whether that\'s Jira, Linear, GitHub Projects, or anything else.',
            ],
        ],
    ],
];
