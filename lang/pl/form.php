<?php

declare(strict_types=1);

return [
    'step_of' => 'Krok :current z :total',
    'step1' => [
        'title' => 'Wybierz usługi',
        'heading' => 'Czego potrzebujesz?',
        'description' => 'Wybierz wszystkie, które pasują',
        'error' => 'Wybierz co najmniej jedną usługę.',
    ],
    'step2' => [
        'title' => 'Twoje dane',
        'heading' => 'Twoje dane',
        'description' => 'Odezwiemy się w ciągu 24 godzin',
        'error' => 'Wypełnij wszystkie wymagane pola (imię, email, wiadomość).',
    ],
    'step3' => [
        'title' => 'Przegląd i wyślij',
        'heading' => 'Przegląd i wyślij',
        'description' => 'Ostatni rzut okiem przed startem',
    ],
    'field' => [
        'name' => 'Imię i nazwisko',
        'company' => 'Firma',
        'email' => 'Email',
        'phone' => 'Telefon / WhatsApp',
        'phone_placeholder' => '+48 XXX XXX XXX',
        'budget' => 'Zakres budżetu',
        'budget_placeholder' => 'Wybierz zakres',
        'timeline' => 'Harmonogram',
        'timeline_placeholder' => 'Wybierz harmonogram',
        'message' => 'Opis projektu',
        'message_placeholder' => 'Opowiedz nam o swoim projekcie, celach i konkretnych wymaganiach...',
        'tech_notes' => 'Notatki techniczne',
        'tech_notes_placeholder' => 'Istniejący stack technologiczny, linki do repo, adresy stagingowe lub ograniczenia, o których powinniśmy wiedzieć...',
    ],
    'review' => [
        'services' => 'Usługi',
        'contact' => 'Kontakt',
        'project' => 'Projekt',
        'tech_notes' => 'Notatki techniczne',
    ],
    'captcha' => 'Szybki test: Ile to :question?',
    'captcha_error' => 'Proszę poprawnie wypełnić captchę.',
    'nav' => [
        'back' => 'Wstecz',
        'continue' => 'Dalej',
        'submit' => 'Wyślij zapytanie',
    ],
    'edit' => 'Edytuj',
    'optional' => '(opcjonalne)',
    'success' => [
        'title' => 'Zapytanie otrzymane!',
        'message' => 'Dzięki za kontakt! Odezwiemy się w ciągu 24 godzin.',
        'back_home' => 'Powrót do strony głównej',
    ],
    'error' => [
        'csrf' => 'Sesja wygasła. Odśwież stronę.',
        'network' => 'Błąd sieci. Sprawdź połączenie.',
        'csrf_token' => 'Nie znaleziono tokena CSRF. Odśwież stronę.',
        'generic' => 'Coś poszło nie tak. Spróbuj ponownie.',
    ],
];
