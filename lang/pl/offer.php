<?php

declare(strict_types=1);

return [
    'hero' => [
        'badge' => 'Cennik',
        'title_part1' => 'Ceny, które widzisz,',
        'title_part2' => 'zanim z kimkolwiek porozmawiasz',
        'description' => 'Wybierz punkt startowy albo złóż własny pakiet miesięczny poniżej. Koszt znasz jeszcze przed pierwszą rozmową.',
    ],
    'currency_label' => 'Waluta',
    'from' => 'od',
    'period' => [
        'once' => 'jednorazowo',
        'month' => 'miesięcznie',
    ],
    'net_note' => 'Wszystkie ceny netto.',
    'best_for' => 'Dla kogo',
    'measured_by' => 'Po czym to ocenisz',
    'packages' => [
        'audit' => [
            'title' => 'Audyt',
            'tagline' => 'Sprawdź, jak jest naprawdę',
            'for' => 'Dla właścicieli, którzy odziedziczyli system, mają wątpliwości co do dostawcy albo planują dużą zmianę.',
            'description' => 'Senior przegląda kod, serwery i procesy, a potem opisuje, co jest nie tak, ile może Cię to kosztować i od czego zacząć.',
            'includes' => [
                'Przegląd kodu, infrastruktury i dostępów',
                'Ryzyka uszeregowane według wpływu na biznes',
                'Pisemny plan działań na 90 dni',
                'Rozmowa omawiająca wyniki',
            ],
            'measure' => 'Jasna lista ryzyk i plan, który możesz dać dowolnemu programiście, także spoza naszego zespołu.',
            'cta' => 'Zamów audyt',
        ],
        'custom' => [
            'title' => 'System na miarę',
            'tagline' => 'CRM, narzędzie wewnętrzne lub integracje, zbudowane pod Twój proces',
            'for' => 'Dla firm, które wyrosły z Excela albo gotowych narzędzi.',
            'description' => 'Zaczynamy od płatnych warsztatów. Dostajesz pisemny zakres i stałą wycenę pierwszej wersji, a dopiero potem decydujesz, czy budujemy.',
            'includes' => [
                'Warsztaty i pisemny zakres prac',
                'Laravel i Filament, z testami od początku',
                'Integracje z Twoimi narzędziami, przez n8n lub Make, gdy to wystarczy',
                'Dokumentacja i przekazanie zespołowi',
            ],
            'measure' => 'Godziny ręcznej pracy, które znikają, i system, z którego zespół faktycznie korzysta.',
            'cta' => 'Umów warsztaty',
        ],
        'care' => [
            'title' => 'Opieka',
            'tagline' => 'Miesięczna pula godzin seniora',
            'for' => 'Dla firm z działającym systemem, który potrzebuje napraw, aktualizacji i drobnych funkcji.',
            'description' => 'Naprawy, aktualizacje i nowe funkcje z puli godzin. Wielkość pakietu wybierasz poniżej i możesz ją zmieniać wraz z potrzebami.',
            'includes' => [
                'Miesięczna pula godzin, niewykorzystane przechodzą na kolejny miesiąc',
                'Środowisko testowe i testy automatyczne w standardzie',
                'Aktualizacje bezpieczeństwa i frameworka planowane w ramach godzin',
                'Miesięczny raport: co wdrożone i co jest zagrożone',
            ],
            'measure' => 'Wdrożone zmiany, dostępność i otwarte ryzyka, wszystko w miesięcznym raporcie.',
            'cta' => 'Skonfiguruj pakiet',
        ],
        'cto' => [
            'title' => 'Fractional CTO',
            'tagline' => 'Doświadczony lider techniczny bez zatrudniania na etat',
            'for' => 'Dla rozwijających się firm, które podejmują decyzje techniczne bez seniora, który by je sprawdził.',
            'description' => 'Regularne spotkania o architekturze, rekrutacji i planach rozwoju, a do tego przeglądy kodu i mentoring zespołu.',
            'includes' => [
                'Od 8 do 16 godzin miesięcznie',
                'Przeglądy architektury i decyzje technologiczne',
                'Pomoc w rekrutacji i rozmowy z programistami',
                'Plan rozwoju dopasowany do budżetu',
            ],
            'measure' => 'Mniej kosztownych niespodzianek technicznych i zespół, który dowozi bez Twojego pilnowania.',
            'cta' => 'Porozmawiajmy o wsparciu CTO',
        ],
    ],
    'included' => [
        'title' => 'W każdym projekcie, bez dopłat',
        'description' => 'Niektórzy dostawcy sprzedają to jako dodatki. Dla nas to minimum profesjonalnej pracy.',
        'items' => [
            'Kod, baza danych i konta na Ciebie od pierwszego dnia',
            'Testy automatyczne tego, co budujemy',
            'Analiza statyczna i ciągła integracja',
            'Środowisko testowe do sprawdzania zmian przed publikacją',
            'Dokumentacja przydatna dla kolejnego programisty',
            'Jedna, konkretna osoba odpowiedzialna za Twój projekt',
        ],
    ],
    'configurator' => [
        'badge' => 'Konfigurator',
        'title' => 'Złóż swój pakiet miesięczny',
        'description' => 'Wybierz, czego potrzebujesz, a suma policzy się na bieżąco. Skopiuj link, żeby pokazać go zespołowi.',
        'hours' => [
            'title' => 'Miesięczna pula godzin',
            'hint' => 'Niewykorzystane godziny przechodzą na kolejny miesiąc.',
            'bonus' => '+:hours h gratis',
            'options' => [
                '5' => ['label' => '5 h', 'description' => 'Naprawy i drobne zmiany'],
                '10' => ['label' => '10 h', 'description' => 'Stałe usprawnienia'],
                '20' => ['label' => '20 h', 'description' => 'Aktywny rozwój'],
                '40' => ['label' => '40 h', 'description' => 'Produkt, który ciągle rośnie'],
            ],
        ],
        'response' => [
            'title' => 'Czas reakcji',
            'hint' => 'Czas do pierwszej odpowiedzi, poniedziałek–piątek, 10:00–19:00 czasu polskiego. Nie sprzedajemy dyżurów 24/7, bo nie obiecujemy tego, czego nie dowieziemy.',
            'included' => 'w cenie',
            'options' => [
                'standard' => ['label' => 'Standard', 'description' => 'Do 2 dni roboczych'],
                'priority' => ['label' => 'Priorytet', 'description' => 'Do 8 godzin roboczych'],
            ],
        ],
        'cto' => [
            'title' => 'Fractional CTO',
            'hint' => 'Przywództwo techniczne ponad pulę godzin.',
            'options' => [
                'none' => ['label' => 'Nie teraz', 'description' => 'Możesz dodać później'],
                'cto_8' => ['label' => '8 h miesięcznie', 'description' => 'Regularne wytyczne i przeglądy'],
                'cto_16' => ['label' => '16 h miesięcznie', 'description' => 'Aktywne prowadzenie i mentoring zespołu'],
            ],
        ],
        'addons' => [
            'title' => 'Dodatki miesięczne',
            'options' => [
                'integration_watch' => [
                    'label' => 'Opieka nad integracjami',
                    'description' => 'Gdy zewnętrzna usługa zepsuje integrację lub automatyzację (KSeF, BaseLinker, Stripe, n8n, Make), naprawa nie zużywa Twoich godzin.',
                ],
                'security_review' => [
                    'label' => 'Kwartalny przegląd bezpieczeństwa',
                    'description' => 'Pisemny przegląd zależności, dostępów i konfiguracji co trzy miesiące.',
                ],
            ],
        ],
        'one_off' => [
            'title' => 'Usługi jednorazowe',
            'options' => [
                'data_migration' => [
                    'label' => 'Porządki i migracja danych',
                    'description' => 'Przeniesienie Exceli, plików CSV lub starego systemu do nowej bazy. Cena startowa, ostateczna wycena zależy od danych.',
                ],
                'single_fix' => [
                    'label' => 'Pojedyncza naprawa',
                    'description' => 'Jeden konkretny problem, do pół dnia pracy, bez abonamentu. Cena startowa.',
                ],
            ],
        ],
        'summary' => [
            'title' => 'Twój pakiet',
            'hours_line' => ':hours h miesięcznie',
            'hours_bonus_line' => ':hours h + :bonus h gratis miesięcznie',
            'monthly_total' => 'Razem miesięcznie',
            'one_off_total' => 'Jednorazowo, od',
            'term' => 'Umowa miesięczna, 30 dni wypowiedzenia.',
            'start' => 'Zacznij od tego pakietu',
            'copy_link' => 'Skopiuj link',
            'copied' => 'Skopiowano link',
            'contact_note' => 'Skonfigurowany pakiet',
        ],
    ],
    'faq_cta' => 'Masz pytanie o ceny?',
    'cta' => [
        'heading' => 'Nie wiesz, czego potrzebujesz?',
        'description' => 'Zrób audyt w 10 pytaniach i dostań rekomendację albo porozmawiaj z nami przez 30 minut, bezpłatnie.',
        'audit' => 'Zrób audyt',
    ],
];
