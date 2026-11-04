<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Bezpłatny audyt techniczny w 10 pytaniach — Laragod',
        'description' => 'Dziesięć prostych pytań o oprogramowanie w Twojej firmie. Natychmiastowa ocena kontroli, stabilności i automatyzacji, bez podawania maila.',
    ],
    'hero' => [
        'badge' => 'Bezpłatny audyt',
        'title_part1' => 'Jakie ryzyko niesie',
        'title_part2' => 'oprogramowanie Twojej firmy?',
        'description' => 'Dziesięć pytań, około dwóch minut, bez wiedzy technicznej. Wynik widzisz od razu i nie musisz podawać maila.',
    ],
    'nav' => [
        'progress' => 'Pytanie :current z :total',
        'back' => 'Wstecz',
        'restart' => 'Zacznij od nowa',
    ],
    'questions' => [
        'size' => [
            'title' => 'Ile osób pracuje w Twojej firmie?',
            'options' => ['1_5' => '1-5', '6_20' => '6-20', '21_50' => '21-50', '51_100' => '51-100', '100_plus' => '100+'],
        ],
        'stack' => [
            'title' => 'Na czym głównie działa Twoja firma?',
            'options' => [
                'spreadsheets' => 'Arkusze Excel',
                'scattered' => 'Kilka niepołączonych narzędzi',
                'wordpress' => 'WordPress z wtyczkami',
                'saas' => 'Gotowe oprogramowanie (CRM, ERP)',
                'custom' => 'Własna aplikacja',
            ],
        ],
        'access' => [
            'title' => 'Kto ma dostęp do kodu i bazy danych?',
            'options' => ['ours' => 'My, na własnych kontach', 'vendor' => 'Tylko nasz dostawca', 'unknown' => 'Nie wiem'],
        ],
        'change' => [
            'title' => 'Kto może dziś zmienić coś w Waszym systemie?',
            'options' => ['team' => 'Własny zespół', 'one_dev' => 'Jeden programista', 'vendor' => 'Firma zewnętrzna', 'nobody' => 'Właściwie nikt'],
        ],
        'leaves' => [
            'title' => 'Co się stanie, gdy ta osoba lub firma zniknie?',
            'options' => ['covered' => 'Ktoś inny przejmie', 'hard' => 'Będzie ciężko', 'stuck' => 'Stajemy'],
        ],
        'deploy' => [
            'title' => 'Jak zmiany trafiają do działającego systemu?',
            'options' => [
                'automatic' => 'Automatycznie, po testach',
                'manual_ok' => 'Ręcznie, bez problemów',
                'manual_breaks' => 'Ręcznie, często coś się psuje',
                'afraid' => 'Boimy się tego ruszać',
            ],
        ],
        'manual' => [
            'title' => 'Ile godzin tygodniowo zespół traci na przepisywanie danych?',
            'options' => ['under_2' => 'Poniżej 2', '2_10' => '2-10', '10_40' => '10-40', '40_plus' => '40+'],
        ],
        'outage' => [
            'title' => 'Kto pierwszy zauważa, że coś przestało działać?',
            'options' => ['monitoring' => 'Nasz monitoring', 'us' => 'Ktoś z zespołu', 'customer' => 'Klient', 'unknown' => 'Nie wiem'],
        ],
        'need' => [
            'title' => 'Czego najbardziej potrzebujesz teraz?',
            'options' => [
                'new_system' => 'Nowego systemu',
                'rescue' => 'Ratunku dla obecnego',
                'integrations' => 'Połączenia narzędzi',
                'care' => 'Stałej opieki',
                'cto' => 'Doświadczonego lidera technicznego',
                'unsure' => 'Nie jestem pewien/pewna',
            ],
        ],
        'when' => [
            'title' => 'Kiedy chcesz zacząć?',
            'options' => ['now' => 'Od razu', 'month' => 'W ciągu miesiąca', 'quarter' => 'W ciągu kwartału', 'later' => 'Później'],
        ],
    ],
    'result' => [
        'title' => 'Twój wynik',
        'description' => 'To szybka samoocena na podstawie Twoich odpowiedzi. Nie zastąpi obejrzenia samego systemu.',
        'levels' => ['good' => 'Dobrze', 'watch' => 'Warto pilnować', 'risk' => 'Zagrożenie'],
        'dimensions' => [
            'control' => [
                'title' => 'Kontrola',
                'question' => 'Czy firma poradzi sobie bez obecnego programisty lub dostawcy?',
                'good' => 'Klucze są u Ciebie i ktoś inny może przejąć pracę. Dbaj o aktualne dostępy i dokumentację.',
                'watch' => 'Zależysz od kilku osób. Spisz, kto ma jakie dostępy, i upewnij się, że kod jest na Twoich kontach.',
                'risk' => 'Firma zależy od kogoś, na kogo nie masz wpływu. Najpierw zabezpiecz dostęp do kodu i danych.',
            ],
            'stability' => [
                'title' => 'Stabilność',
                'question' => 'Czy możesz bezpiecznie zmieniać system i czy wiesz, gdy przestaje działać?',
                'good' => 'Zmiany są rutyną, a problemy wychodzą wcześnie. Od czasu do czasu sprawdź kopie zapasowe, odtwarzając je.',
                'watch' => 'Działa, ale opiera się na ostrożności i szczęściu. Następny krok to automatyczne wdrożenia i monitoring.',
                'risk' => 'Każda zmiana to loteria, a problemy mogą pierwsi zauważać klienci. Zacznij od monitoringu i sprawdzonej kopii zapasowej.',
            ],
            'automation' => [
                'title' => 'Automatyzacja',
                'question' => 'Czy płacisz zespołowi za pracę, którą mógłby wykonać system?',
                'good' => 'Niewiele czasu idzie na powtarzalną pracę. Poszukaj kolejnego procesu, który warto połączyć.',
                'watch' => 'Część tygodnia zespołu idzie na kopiowanie danych. Jedna lub dwie integracje mogą ten czas odzyskać.',
                'risk' => 'Dużo płatnego czasu idzie na przepisywanie, a to rodzi błędy. Zwykle tu najszybciej widać zwrot.',
            ],
        ],
        'recommendation_title' => 'Co byśmy zaproponowali',
        'recommendations' => [
            'audit' => 'Zacznij od audytu, żeby poznać prawdziwe ryzyka, zanim wydasz więcej na system.',
            'custom' => 'Zacznij od warsztatów pod system na miarę: pisemny zakres i stała wycena, zanim podejmiesz decyzję.',
            'care' => 'Miesięczny pakiet opieki zabezpieczy system i pozwoli go dalej ulepszać.',
            'cto' => 'Wsparcie Fractional CTO da Ci doświadczony osąd techniczny bez zatrudniania na etat.',
        ],
        'view_package' => 'Zobacz ten pakiet',
        'book_call' => 'Omówmy to, bezpłatnie',
        'contact_note' => 'Wynik audytu w 10 pytaniach',
        'recommended' => 'Polecamy',
    ],
];
