<?php

declare(strict_types=1);

return [
    'hero' => [
        'badge' => 'Portfolio',
        'title_part1' => 'Nasze',
        'title_part2' => 'prace',
        'description' => 'Aplikacje Laravel zbudowane, by przetrwać. Oto próbka tego, co dostarczyliśmy klientom, którzy cenią jakość tak samo jak my.',
    ],
    'featured' => 'Wyróżnione',
    'challenge' => 'Wyzwanie',
    'solution' => 'Rozwiązanie',
    'code' => 'Kod',
    'view_live' => 'Zobacz na żywo',
    'empty' => [
        'title' => 'Portfolio wkrótce',
        'description' => 'Obecnie dodajemy nasze najnowsze projekty. W międzyczasie porozmawiajmy o Twoim.',
        'cta' => 'Rozpocznij rozmowę',
    ],
    'cta' => [
        'heading' => 'Chcesz tutaj swój projekt?',
        'description' => 'Zbudujmy coś wartego pokazania. Aplikacje Laravel, które się skalują, działają wydajnie i które naprawdę przyjemnie się utrzymuje.',
        'button' => 'Rozpocznij swój projekt',
    ],
    'projects' => [
        'financial' => [
            'title' => 'Modernizacja platformy finansowej',
            'excerpt' => 'Migracja legacy aplikacji PHP do Laravel 11 bez przestojów, z kompleksowym pokryciem testami i poprawioną wydajnością.',
            'description' => 'Kompletna modernizacja platformy usług finansowych z legacy PHP 5.6 do Laravel 11.',
            'challenge' => 'Legacy codebase na PHP 5.6 bez testów, z częstymi problemami produkcyjnymi i lukami bezpieczeństwa.',
            'solution' => 'Stopniowa migracja do Laravel z kompleksowym zestawem testów Pest, PHPStan poziom 8, pipeline CI/CD i wdrożenie bez przestojów.',
        ],
        'ecommerce' => [
            'title' => 'Panel administracyjny e-commerce',
            'excerpt' => 'Zbudowaliśmy dedykowany panel admina Filament v4 dla wielodostawcowej platformy e-commerce z zaawansowanym zarządzaniem magazynem.',
            'description' => 'Kompletne rozwiązanie panelu admina do zarządzania produktami, zamówieniami, dostawcami i magazynem.',
            'challenge' => 'Gotowe rozwiązania nie radziły sobie ze złożonymi wielodostawcowymi workflow i wymaganiami śledzenia magazynu.',
            'solution' => 'Dedykowany panel admina Filament v4 z dostosowanymi workflow, synchronizacją magazynu w czasie rzeczywistym i integracją portalu dostawców.',
        ],
        'api' => [
            'title' => 'Platforma integracji API',
            'excerpt' => 'Opracowaliśmy RESTful API integrujące ponad 15 usług zewnętrznych, w tym Stripe, Xero i HubSpot.',
            'description' => 'Scentralizowana platforma API łącząca wiele systemów biznesowych.',
            'challenge' => 'Klient używał ponad 15 rozłączonych narzędzi SaaS, co prowadziło do niespójności danych i ręcznego wprowadzania danych.',
            'solution' => 'Laravel API z kolejkowanymi zadaniami, obsługą webhooków i kompleksowym logowaniem błędów dla wszystkich integracji.',
        ],
        'saas' => [
            'title' => 'Rozwój MVP SaaS',
            'excerpt' => 'Zbudowaliśmy gotowe do produkcji MVP SaaS w 8 tygodni z rozliczeniami Stripe, zarządzaniem zespołem i dostępem API.',
            'description' => 'Pełnostackowa aplikacja SaaS od koncepcji do uruchomienia.',
            'challenge' => 'Startup potrzebował szybko zwalidować product-market fit bez akumulowania długu technologicznego.',
            'solution' => 'Laravel 12 + Nuxt.js SaaS z subskrypcjami Stripe, zarządzaniem zespołem i kompleksowym testowaniem—zbudowane do skalowania.',
        ],
    ],
];
