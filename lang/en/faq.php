<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Frequently Asked Questions | Pricing, Process & Services — Laragod',
        'description' => 'Answers about pricing, ownership, how we work and each of our Laravel services. Clear answers, with no sales talk.',
    ],
    'hero' => [
        'badge' => 'FAQ',
        'title_part1' => 'Questions,',
        'title_part2' => 'answered plainly',
        'description' => 'Pricing, ownership, process and every service we offer. If your question is not here, ask us.',
    ],
    'services_group' => 'Our services',
    'groups' => [
        'pricing' => [
            'title' => 'Pricing and payment',
            'items' => [
                [
                    'question' => 'How much does it cost?',
                    'answer' => 'Our pricing page lists every starting price, and the configurator shows the monthly total as you choose. New builds get a fixed written quote after the discovery workshop.',
                ],
                [
                    'question' => 'Which currencies do you work in?',
                    'answer' => 'Polish zloty, British pounds and euros. You choose the currency on the pricing page, and we invoice in the same one.',
                ],
                [
                    'question' => 'Do prices include VAT?',
                    'answer' => 'No. All listed prices exclude VAT, which is added where it applies.',
                ],
                [
                    'question' => 'What happens to hours we do not use?',
                    'answer' => 'They roll over for one month, so a quiet month is not wasted.',
                ],
                [
                    'question' => 'Is there a long contract?',
                    'answer' => 'Monthly packages run month to month, with 30 days notice. Fixed-scope builds run until the agreed scope is delivered.',
                ],
                [
                    'question' => 'Are there hidden costs?',
                    'answer' => 'Hosting and third-party services are billed to you directly by the provider, at their price. Anything else is in the written quote before you sign.',
                ],
            ],
        ],
        'ownership' => [
            'title' => 'Ownership and security',
            'items' => [
                [
                    'question' => 'Who owns the code?',
                    'answer' => 'You do, from the first day. The repository, database and accounts are in your name, with no licence fees.',
                ],
                [
                    'question' => 'What happens if we stop working together?',
                    'answer' => 'You keep everything, and we hand over documentation and access. Another developer can pick it up, which is exactly how we build things.',
                ],
                [
                    'question' => 'Will you sign an NDA?',
                    'answer' => 'Yes. We can sign one before you share any details.',
                ],
            ],
        ],
        'process' => [
            'title' => 'Working together',
            'items' => [
                [
                    'question' => 'How do we start?',
                    'answer' => 'With a free 30-minute call. Afterwards you get a written proposal with scope, price and timeline, within 2 to 5 working days.',
                ],
                [
                    'question' => 'How quickly do you reply?',
                    'answer' => 'New enquiries get an answer within 24 hours on working days. On a care package, the response time you chose applies: 2 working days or 8 working hours.',
                ],
                [
                    'question' => 'Do you offer 24/7 support?',
                    'answer' => 'No. We would rather promise a response time we can keep than sell cover we cannot provide.',
                ],
                [
                    'question' => 'Should we use n8n or Make, or custom code?',
                    'answer' => 'Whichever is simplest and will hold up. n8n or Make often suits straightforward workflows. Code is better when the process is business-critical, needs testing or handles sensitive data.',
                ],
                [
                    'question' => 'Who will actually do the work?',
                    'answer' => 'Laragod is founder-led, and trusted senior developers join when a project needs them. You always have one named person responsible.',
                ],
            ],
        ],
    ],
    'cta' => [
        'heading' => 'Still have a question?',
        'description' => 'Ask us directly. Thirty minutes, free, and no obligation.',
    ],
];
