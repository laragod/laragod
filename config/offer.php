<?php

declare(strict_types=1);

/*
 |--------------------------------------------------------------------------
 | Commercial offer
 |--------------------------------------------------------------------------
 |
 | Single source of truth for every public price and for the audit scoring.
 | All amounts are net, in whole currency units. Wording lives in lang/.
 |
 */

return [
    'default_currency' => [
        'pl' => 'PLN',
        'en' => 'GBP',
    ],

    // symbol, symbol_first and group drive one formatter shared by x-price and the layout script.
    // Intl.NumberFormat cannot be used: pl-PL leaves amounts below 10 000 ungrouped ("1500 zł").
    'currencies' => [
        'PLN' => ['symbol' => 'zł', 'symbol_first' => false, 'group' => "\u{00A0}"],
        'GBP' => ['symbol' => '£', 'symbol_first' => true, 'group' => ','],
        'EUR' => ['symbol' => '€', 'symbol_first' => true, 'group' => ','],
    ],

    // Contact form budget ranges as [from, to]; null marks an open end.
    'budget_ranges' => [
        'under-5k' => ['PLN' => [null, 25000], 'GBP' => [null, 5000], 'EUR' => [null, 6000]],
        '5k-10k' => ['PLN' => [25000, 50000], 'GBP' => [5000, 10000], 'EUR' => [6000, 12000]],
        '10k-25k' => ['PLN' => [50000, 125000], 'GBP' => [10000, 25000], 'EUR' => [12000, 30000]],
        '25k-50k' => ['PLN' => [125000, 250000], 'GBP' => [25000, 50000], 'EUR' => [30000, 60000]],
        '50k-plus' => ['PLN' => [250000, null], 'GBP' => [50000, null], 'EUR' => [60000, null]],
    ],

    'packages' => [
        'audit' => [
            'from' => ['PLN' => 2400, 'GBP' => 500, 'EUR' => 560],
            'period' => 'once',
            'service' => 'audit-review',
        ],
        'custom' => [
            'from' => ['PLN' => 2400, 'GBP' => 500, 'EUR' => 560],
            'period' => 'once',
            'service' => 'internal-tool',
        ],
        'care' => [
            'from' => ['PLN' => 1500, 'GBP' => 325, 'EUR' => 350],
            'period' => 'month',
            'service' => 'ongoing-support',
        ],
        'cto' => [
            'from' => ['PLN' => 2400, 'GBP' => 500, 'EUR' => 560],
            'period' => 'month',
            'service' => 'fractional-cto',
        ],
    ],

    'configurator' => [
        'hours' => [
            '5' => ['bonus' => 0, 'prices' => ['PLN' => 1500, 'GBP' => 325, 'EUR' => 350]],
            '10' => ['bonus' => 1, 'prices' => ['PLN' => 3000, 'GBP' => 650, 'EUR' => 700]],
            '20' => ['bonus' => 2, 'prices' => ['PLN' => 6000, 'GBP' => 1300, 'EUR' => 1400]],
            '40' => ['bonus' => 4, 'prices' => ['PLN' => 12000, 'GBP' => 2600, 'EUR' => 2800]],
        ],
        'default_hours' => '10',

        // Only response levels a founder-led team can honour. Add faster tiers once cover exists.
        'response' => [
            'standard' => ['prices' => ['PLN' => 0, 'GBP' => 0, 'EUR' => 0]],
            'priority' => ['prices' => ['PLN' => 1000, 'GBP' => 200, 'EUR' => 230]],
        ],
        'default_response' => 'standard',

        'cto' => [
            'none' => ['prices' => ['PLN' => 0, 'GBP' => 0, 'EUR' => 0]],
            'cto_8' => ['prices' => ['PLN' => 2400, 'GBP' => 500, 'EUR' => 560]],
            'cto_16' => ['prices' => ['PLN' => 4800, 'GBP' => 1000, 'EUR' => 1120]],
        ],
        'default_cto' => 'none',

        'addons' => [
            'integration_watch' => ['prices' => ['PLN' => 1000, 'GBP' => 200, 'EUR' => 230]],
            'security_review' => ['prices' => ['PLN' => 1000, 'GBP' => 200, 'EUR' => 230]],
        ],

        'one_off' => [
            'data_migration' => ['prices' => ['PLN' => 3000, 'GBP' => 600, 'EUR' => 700]],
            'single_fix' => ['prices' => ['PLN' => 1200, 'GBP' => 250, 'EUR' => 280]],
        ],
    ],

    /*
     | Audit scoring. Each scored answer gives 0-2 points to one dimension.
     | Level = points / max: at least 0.75 is "good", at least 0.4 is "watch", else "risk".
     */
    'audit' => [
        'thresholds' => ['good' => 0.75, 'watch' => 0.4],
        'questions' => [
            'size' => [
                'dimension' => null,
                'answers' => ['1_5' => 0, '6_20' => 0, '21_50' => 0, '51_100' => 0, '100_plus' => 0],
            ],
            'stack' => [
                'dimension' => 'automation',
                'answers' => ['spreadsheets' => 0, 'scattered' => 0, 'wordpress' => 1, 'saas' => 1, 'custom' => 2],
            ],
            'access' => ['dimension' => 'control', 'answers' => ['ours' => 2, 'vendor' => 0, 'unknown' => 0]],
            'change' => [
                'dimension' => 'control',
                'answers' => ['team' => 2, 'one_dev' => 1, 'vendor' => 1, 'nobody' => 0],
            ],
            'leaves' => ['dimension' => 'control', 'answers' => ['covered' => 2, 'hard' => 1, 'stuck' => 0]],
            'deploy' => [
                'dimension' => 'stability',
                'answers' => ['automatic' => 2, 'manual_ok' => 1, 'manual_breaks' => 0, 'afraid' => 0],
            ],
            'manual' => [
                'dimension' => 'automation',
                'answers' => ['under_2' => 2, '2_10' => 1, '10_40' => 0, '40_plus' => 0],
            ],
            'outage' => [
                'dimension' => 'stability',
                'answers' => ['monitoring' => 2, 'us' => 1, 'customer' => 0, 'unknown' => 0],
            ],
            'need' => [
                'dimension' => null,
                'answers' => [
                    'new_system' => 0,
                    'rescue' => 0,
                    'integrations' => 0,
                    'care' => 0,
                    'cto' => 0,
                    'unsure' => 0,
                ],
            ],
            'when' => ['dimension' => null, 'answers' => ['now' => 0, 'month' => 0, 'quarter' => 0, 'later' => 0]],
        ],
        // Answer to "need" => recommended package. "unsure" resolves to audit if any dimension is "risk", otherwise care.
        'recommendations' => [
            'new_system' => 'custom',
            'rescue' => 'audit',
            'integrations' => 'custom',
            'care' => 'care',
            'cto' => 'cto',
        ],
    ],

    'industries' => [
        'ecommerce' => ['project' => 'lunaris'],
        'sport-recreation' => ['project' => 'skill-peak'],
        'culture-events' => ['project' => 'adriateatr'],
    ],

    'home_projects' => ['lunaris', 'skill-peak', 'adriateatr'],
];
