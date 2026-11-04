<?php

declare(strict_types=1);

return [
    'hero' => [
        'badge' => 'Siedziba w Wielkiej Brytanii',
        'title_part1' => 'Deweloperzy.',
        'title_part2' => 'Przede wszystkim.',
        'description' => 'Laragod prowadzony jest przez założyciela z Wielkiej Brytanii, z zaufanymi seniorami deweloperami angażowanymi w miarę potrzeb projektu. Jesteśmy deweloperami, którzy są dumni z dobrej roboty—i z którymi całkiem przyjemnie się współpracuje.',
    ],
    'founder' => [
        'title' => 'Z kim faktycznie będziesz pracować',
        'name' => 'Filip Cieślik',
        'role' => 'Założyciel',
        'bio' => 'Filip utrzymuje pakiety open source opisane niżej na tej stronie. Za każdy projekt Laragod odpowiada Filip albo wskazany senior, od pierwszej rozmowy do przekazania.',
    ],
    'origin' => [
        'title' => 'Nazwa',
        'paragraph1' => 'Laragod Laravel Development to agencja Laravel z siedzibą w UK. Nazwa? Kolega żartobliwie nazwał założyciela „Laragod" lata temu, po szczególnie intensywnej migracji legacy aplikacji. Nazwa się przyjęła—tak samo jak nasze podejście do robienia rzeczy porządnie.',
        'paragraph2' => 'Brzmi trochę zuchwale? Zdecydowanie. Ale tak naprawdę chodzi o to: naprawdę zależy nam na rzemiośle. Cieszymy się, gdy piszemy kod, z którym przyjemnie się pracuje, a nie taki, który przyprawia o ból głowy.',
        'paragraph3' => 'Nauczyliśmy się, co działa (a co nie), i postanowiliśmy robić to po swojemu.',
    ],
    'philosophy' => [
        'title' => 'Nasza filozofia',
        'description' => 'Jak myślimy o kodzie i dlaczego to ma znaczenie',
        'foundations' => [
            'title' => 'Fundamenty zamiast skrótów',
            'description' => 'Można budować szybko na chwiejnych podstawach albo poświęcić trochę więcej czasu na solidne fundamenty. Wolimy to drugie—bo zawsze można potem dobudować drugie piętro.',
        ],
        'quality' => [
            'title' => 'Jakość jako standard',
            'description' => 'PHPStan, kompleksowe testowanie, właściwa architektura—to nie dodatki. Tak po prostu pracujemy. To różnica między codebase\'em, który rośnie z Tobą, a takim, który stawia opór na każdym kroku.',
        ],
        'dx' => [
            'title' => 'Developer Experience ma znaczenie',
            'description' => 'Piszemy kod dla ludzi, nie tylko dla maszyn. Czytelna struktura, sensowne nazewnictwo, pomocna dokumentacja—bo następna osoba, która dotknie tego kodu, możesz być Ty lub ktoś z Twojego zespołu.',
        ],
        'honesty' => [
            'title' => 'Zawsze szczerość',
            'description' => 'Jeśli coś nie zadziała, powiemy Ci. Jeśli jest lepsze podejście, wyjaśnimy dlaczego. Zawsze będziesz wiedzieć, na czym stoisz—a najlepszą drogę naprzód znajdziemy razem.',
        ],
    ],
    'tech_stack' => [
        'title' => 'Nasz stack technologiczny',
        'description' => 'Narzędzia, których używamy do budowania aplikacji, które przetrwają',
        'backend' => 'Backend',
        'frontend' => 'Frontend',
        'tools_devops' => 'Narzędzia i DevOps',
    ],
    'values' => [
        'title' => 'Za czym stoimy',
        'craftsmanship' => [
            'title' => 'Rzemiosło ponad prędkość',
            'description' => 'Rozumiemy—biznes potrzebuje wyników. Ale widzieliśmy, co się dzieje, gdy prędkość wygrywa ze wszystkim innym. Budujemy aplikacje, które rosną razem z Tobą, żebyś nie musiał zaczynać od nowa za dwa lata.',
        ],
        'transparency' => [
            'title' => 'Przejrzystość i uczciwość',
            'description' => 'Żadnych niespodzianek, żadnych tajemnic. Dostaniesz jasną komunikację, realistyczne terminy i kod, który faktycznie zrozumiesz. Gramy w jednej drużynie.',
        ],
        'long_term' => [
            'title' => 'Myślenie długoterminowe',
            'description' => 'Budujemy kod, który przyszli deweloperzy docenią. Taki, gdzie otwierają projekt i myślą „fajnie, to ma sens" zamiast „od czego tu w ogóle zacząć?"',
        ],
    ],
    'open_source' => [
        'title' => 'Open Source',
        'description' => 'Kod, który utrzymujemy publicznie—według tych samych standardów, co projekty dla klientów',
        'maintainer' => 'Oba pakiety utrzymuje Filip Cieślik, założyciel Laragod.',
        'github' => 'GitHub',
        'packagist' => 'Packagist',
        'phpskills' => [
            'name' => 'laragod/phpskills',
            'role' => 'Maintainer',
            'tagline' => 'Kalkulatory rankingowe TrueSkill i Elo dla PHP',
            'description' => 'Typowany, przetestowany port systemu rankingowego TrueSkill z Microsoft Research dla PHP 8.2+: gry 1 na 1, drużynowe i każdy na każdego, remisy, częściowy udział w meczu oraz jakość meczu na potrzeby matchmakingu. Filip przejął porzucony port PHP w 2024 roku i przebudował go w 2026.',
            'fact_versions' => 'PHP 8.2 – 8.5',
        ],
        'toolkit' => [
            'name' => 'laragod/toolkit',
            'role' => 'Autor i maintainer',
            'tagline' => 'Backendowy toolkit dla stron portfolio w Laravel',
            'description' => 'Wspólny pakiet Laravel 12 stojący za tą i innymi stronami Laragod: wielokanałowe powiadomienia z formularza kontaktowego (Telegram, Discord, WhatsApp, e-mail), endpointy health, sitemapy generowane z atrybutów i middleware lokalizacji—każda strona potrzebuje już tylko własnych widoków Blade i konfiguracji.',
            'fact_versions' => 'PHP 8.4 · Laravel 12',
            'fact_license' => 'Licencja MIT',
            'fact_usage' => 'Napędza laragod.com',
        ],
    ],
    'cta' => [
        'heading' => 'Brzmi jak Twój rodzaj zespołu?',
        'description' => 'Jeśli cenisz jakość kodu, uczciwą komunikację i pracę z ludźmi, którzy naprawdę lubią to, co robią—pogadajmy.',
    ],
];
