<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Free 10-Question Technical Audit — Laragod',
        'description' => 'Ten plain-language questions about the software behind your business. Get an instant score for control, stability and automation, with no email required.',
    ],
    'hero' => [
        'badge' => 'Free audit',
        'title_part1' => 'How much risk is your',
        'title_part2' => 'software carrying?',
        'description' => 'Ten questions, about two minutes, no technical knowledge needed. You see the result straight away, with no email required.',
    ],
    'nav' => [
        'progress' => 'Question :current of :total',
        'back' => 'Back',
        'restart' => 'Start again',
    ],
    'questions' => [
        'size' => [
            'title' => 'How many people work at your company?',
            'options' => ['1_5' => '1-5', '6_20' => '6-20', '21_50' => '21-50', '51_100' => '51-100', '100_plus' => '100+'],
        ],
        'stack' => [
            'title' => 'What does your company mainly run on?',
            'options' => [
                'spreadsheets' => 'Spreadsheets',
                'scattered' => 'Several tools that are not connected',
                'wordpress' => 'WordPress with plugins',
                'saas' => 'Off-the-shelf software (CRM, ERP)',
                'custom' => 'Our own application',
            ],
        ],
        'access' => [
            'title' => 'Who has access to the code and the database?',
            'options' => ['ours' => 'We do, on our own accounts', 'vendor' => 'Only our supplier', 'unknown' => 'I do not know'],
        ],
        'change' => [
            'title' => 'Who can change your system today?',
            'options' => ['team' => 'Our own team', 'one_dev' => 'One developer', 'vendor' => 'An outside company', 'nobody' => 'Nobody, really'],
        ],
        'leaves' => [
            'title' => 'What happens if that person or company disappears?',
            'options' => ['covered' => 'Someone else takes over', 'hard' => 'It would be difficult', 'stuck' => 'We would be stuck'],
        ],
        'deploy' => [
            'title' => 'How do changes reach your live system?',
            'options' => [
                'automatic' => 'Automatically, after tests',
                'manual_ok' => 'By hand, without problems',
                'manual_breaks' => 'By hand, and things often break',
                'afraid' => 'We are afraid to touch it',
            ],
        ],
        'manual' => [
            'title' => 'How many hours a week does your team spend retyping data?',
            'options' => ['under_2' => 'Under 2', '2_10' => '2-10', '10_40' => '10-40', '40_plus' => '40+'],
        ],
        'outage' => [
            'title' => 'Who is first to notice when something goes down?',
            'options' => ['monitoring' => 'Our monitoring', 'us' => 'Someone on our team', 'customer' => 'A customer', 'unknown' => 'I do not know'],
        ],
        'need' => [
            'title' => 'What do you need most right now?',
            'options' => [
                'new_system' => 'A new system',
                'rescue' => 'Rescuing an existing one',
                'integrations' => 'Connecting our tools',
                'care' => 'Ongoing care',
                'cto' => 'A senior technical lead',
                'unsure' => 'I am not sure',
            ],
        ],
        'when' => [
            'title' => 'When do you want to start?',
            'options' => ['now' => 'Right away', 'month' => 'Within a month', 'quarter' => 'Within a quarter', 'later' => 'Later on'],
        ],
    ],
    'result' => [
        'title' => 'Your result',
        'description' => 'This is a quick self-assessment based on your answers, not a substitute for looking at the actual system.',
        'levels' => ['good' => 'In good shape', 'watch' => 'Worth watching', 'risk' => 'At risk'],
        'dimensions' => [
            'control' => [
                'title' => 'Control',
                'question' => 'Could your business carry on without its current developer or supplier?',
                'good' => 'You hold the keys, and others could take over. Keep access and documentation up to date.',
                'watch' => 'You depend on a few people. Write down who has which access, and make sure the code is in your own accounts.',
                'risk' => 'Your business depends on someone you do not control. Secure access to your code and data first.',
            ],
            'stability' => [
                'title' => 'Stability',
                'question' => 'Can you change the system safely, and would you know if it failed?',
                'good' => 'Changes are routine and you find problems early. Test your backups by restoring them from time to time.',
                'watch' => 'It works, but it relies on care and luck. Automated deployment and monitoring are the next step.',
                'risk' => 'Every change is a gamble and customers may find problems first. Start with monitoring and a tested backup.',
            ],
            'automation' => [
                'title' => 'Automation',
                'question' => 'Is your team paid to do work a system could do?',
                'good' => 'Little time goes on repetitive work. Look for the next process worth connecting.',
                'watch' => 'Some of your team\'s week goes on copying data. One or two integrations could win that back.',
                'risk' => 'A lot of paid time goes on retyping, and that causes errors. This is usually the fastest place to get a return.',
            ],
        ],
        'recommendation_title' => 'What we would suggest',
        'recommendations' => [
            'audit' => 'Start with an audit, so you know the real risks before you spend more on the system.',
            'custom' => 'Start with a discovery workshop for a custom system: a written scope and a fixed quote before you decide.',
            'care' => 'A monthly care package would keep the system safe and let it keep improving.',
            'cto' => 'Fractional CTO support would give you senior technical judgement without a full-time hire.',
        ],
        'view_package' => 'See this package',
        'book_call' => 'Talk it through, free',
        'contact_note' => '10-question audit result',
        'recommended' => 'Recommended',
    ],
];
