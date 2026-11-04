@php
    $offer = config('offer.configurator');
    $packages = config('offer.packages');
    $defaultHours = (string) $offer['default_hours'];
    $defaultResponse = $offer['default_response'];
    $defaultCto = $offer['default_cto'];

    $hoursLine = function (string $hours) use ($offer): string {
        $bonus = $offer['hours'][$hours]['bonus'];

        return $bonus > 0
            ? __('offer.configurator.summary.hours_bonus_line', ['hours' => $hours, 'bonus' => $bonus])
            : __('offer.configurator.summary.hours_line', ['hours' => $hours]);
    };

    // Rendered up front so the summary is correct before, and without, any JavaScript.
    $defaultLines = [
        ['label' => $hoursLine($defaultHours), 'prices' => $offer['hours'][$defaultHours]['prices']],
        [
            'label' => __('offer.configurator.response.title') . ': ' . __("offer.configurator.response.options.{$defaultResponse}.label"),
            'prices' => $offer['response'][$defaultResponse]['prices'],
        ],
    ];

    if ($defaultCto !== 'none') {
        $defaultLines[] = [
            'label' => __('offer.configurator.cto.title') . ': ' . __("offer.configurator.cto.options.{$defaultCto}.label"),
            'prices' => $offer['cto'][$defaultCto]['prices'],
        ];
    }

    $monthlyTotal = [];
    foreach (array_keys(config('offer.currencies')) as $currency) {
        $monthlyTotal[$currency] = array_sum(array_map(fn (array $line): int => $line['prices'][$currency], $defaultLines));
    }

    $jsConfig = [
        'hours' => $offer['hours'],
        'response' => $offer['response'],
        'cto' => $offer['cto'],
        'addons' => $offer['addons'],
        'one_off' => $offer['one_off'],
        'defaults' => ['h' => $defaultHours, 'r' => $defaultResponse, 'c' => $defaultCto],
        'currencies' => array_keys(config('offer.currencies')),
        'services' => ['care' => $packages['care']['service'], 'cto' => $packages['cto']['service']],
        'contactUrl' => locale_route('contact.show'),
    ];
@endphp

<div id="configurator-app" class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    <div class="lg:col-span-2 space-y-10">
        <fieldset>
            <legend class="text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.hours.title') }}</legend>
            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">{{ __('offer.configurator.hours.hint') }}</p>
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-3">
                @foreach($offer['hours'] as $hours => $option)
                    <x-configurator-option
                        type="radio"
                        group="h"
                        :value="(string) $hours"
                        :label="__('offer.configurator.hours.options.' . $hours . '.label')"
                        :description="__('offer.configurator.hours.options.' . $hours . '.description')"
                        :prices="$option['prices']"
                        :badge="$option['bonus'] > 0 ? __('offer.configurator.hours.bonus', ['hours' => $option['bonus']]) : null"
                        :checked="(string) $hours === $defaultHours" />
                @endforeach
            </div>
        </fieldset>

        <fieldset>
            <legend class="text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.response.title') }}</legend>
            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">{{ __('offer.configurator.response.hint') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($offer['response'] as $key => $option)
                    @php $isFree = max($option['prices']) === 0; @endphp
                    <x-configurator-option
                        type="radio"
                        group="r"
                        :value="$key"
                        :label="__('offer.configurator.response.options.' . $key . '.label')"
                        :description="__('offer.configurator.response.options.' . $key . '.description')"
                        :prices="$isFree ? null : $option['prices']"
                        :price-note="$isFree ? __('offer.configurator.response.included') : null"
                        :checked="$key === $defaultResponse" />
                @endforeach
            </div>
        </fieldset>

        <fieldset>
            <legend class="text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.cto.title') }}</legend>
            <p class="mt-1 mb-4 text-sm text-gray-600 dark:text-gray-400">{{ __('offer.configurator.cto.hint') }}</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                @foreach($offer['cto'] as $key => $option)
                    <x-configurator-option
                        type="radio"
                        group="c"
                        :value="$key"
                        :label="__('offer.configurator.cto.options.' . $key . '.label')"
                        :description="__('offer.configurator.cto.options.' . $key . '.description')"
                        :prices="$key === 'none' ? null : $option['prices']"
                        :checked="$key === $defaultCto" />
                @endforeach
            </div>
        </fieldset>

        <fieldset>
            <legend class="mb-4 text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.addons.title') }}</legend>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($offer['addons'] as $key => $option)
                    <x-configurator-option
                        type="checkbox"
                        group="a"
                        :value="$key"
                        :label="__('offer.configurator.addons.options.' . $key . '.label')"
                        :description="__('offer.configurator.addons.options.' . $key . '.description')"
                        :prices="$option['prices']" />
                @endforeach
            </div>
        </fieldset>

        <fieldset>
            <legend class="mb-4 text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.one_off.title') }}</legend>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($offer['one_off'] as $key => $option)
                    <x-configurator-option
                        type="checkbox"
                        group="o"
                        :value="$key"
                        :label="__('offer.configurator.one_off.options.' . $key . '.label')"
                        :description="__('offer.configurator.one_off.options.' . $key . '.description')"
                        :prices="$option['prices']" />
                @endforeach
            </div>
        </fieldset>
    </div>

    {{-- Sticky summary, below the options on mobile --}}
    <aside class="lg:sticky lg:top-24 p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50 shadow-xl shadow-primary/5">
        <h3 class="text-xl font-heading font-bold text-gray-900 dark:text-white">{{ __('offer.configurator.summary.title') }}</h3>

        <ul id="cfg-lines" class="mt-4 space-y-3">
            @foreach($defaultLines as $line)
                <li class="flex items-start justify-between gap-4 text-sm text-gray-700 dark:text-gray-300">
                    <span>{{ $line['label'] }}</span>
                    @if(max($line['prices']) === 0)
                        <span class="text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ __('offer.configurator.response.included') }}</span>
                    @else
                        <span class="font-semibold text-gray-900 dark:text-white whitespace-nowrap"><x-price :prices="$line['prices']" /></span>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="mt-5 pt-5 border-t border-gray-200 dark:border-gray-700">
            <p class="flex items-baseline justify-between gap-4">
                <span class="font-semibold text-gray-900 dark:text-white">{{ __('offer.configurator.summary.monthly_total') }}</span>
                <span class="text-2xl font-heading font-bold text-gray-900 dark:text-white whitespace-nowrap"><x-price :prices="$monthlyTotal" id="cfg-monthly-total" /></span>
            </p>
            <p id="cfg-one-off-row" class="mt-2 flex items-baseline justify-between gap-4 hidden">
                <span class="font-semibold text-gray-900 dark:text-white">{{ __('offer.configurator.summary.one_off_total') }}</span>
                <span id="cfg-one-off-total" class="text-lg font-heading font-bold text-gray-900 dark:text-white whitespace-nowrap"></span>
            </p>
        </div>

        <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">{{ __('offer.configurator.summary.term') }}</p>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ __('offer.net_note') }}</p>

        <a id="cfg-start" href="{{ locale_route('contact.show', ['services' => $packages['care']['service']]) }}" class="mt-6 btn btn-primary btn-shimmer w-full">
            {{ __('offer.configurator.summary.start') }}
        </a>
        <button type="button" id="cfg-copy" class="mt-3 btn btn-outline w-full" aria-live="polite">
            {{ __('offer.configurator.summary.copy_link') }}
        </button>
        {{-- Wrapped because .form-control sets display and would override .hidden --}}
        <div id="cfg-link-row" class="mt-3 hidden">
            <input type="text" id="cfg-link" readonly aria-label="{{ __('offer.configurator.summary.copy_link') }}" class="form-control text-sm">
        </div>
    </aside>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const root = document.getElementById('configurator-app');
        const $ = id => document.getElementById(id);
        const money = window.LaragodCurrency;
        const cfg = @json($jsConfig);
        const t = @json(__('offer.configurator'));
        const netNote = @json(__('offer.net_note'));
        const query = new URLSearchParams(window.location.search);
        const ownParams = ['h', 'r', 'c', 'a', 'o', 'cur'];
        const has = (group, key) => Object.prototype.hasOwnProperty.call(group, key);

        // Deep link: anything that is not a configured option falls back to the default.
        const pickOne = (name, group, fallback) => {
            const value = query.get(name);

            return value !== null && has(group, value) ? value : fallback;
        };
        const pickMany = (name, group) => {
            const requested = (query.get(name) || '').split(',');

            return Object.keys(group).filter(key => requested.includes(key));
        };

        const state = {
            h: pickOne('h', cfg.hours, cfg.defaults.h),
            r: pickOne('r', cfg.response, cfg.defaults.r),
            c: pickOne('c', cfg.cto, cfg.defaults.c),
            a: pickMany('a', cfg.addons),
            o: pickMany('o', cfg.one_off),
        };

        root.querySelectorAll('input[data-cfg]').forEach(input => {
            const selected = state[input.dataset.cfg];
            input.checked = Array.isArray(selected) ? selected.includes(input.value) : selected === input.value;
        });

        function hoursLine(hours) {
            const bonus = cfg.hours[hours].bonus;
            const template = bonus > 0 ? t.summary.hours_bonus_line : t.summary.hours_line;

            return template.replace(':hours', hours).replace(':bonus', bonus);
        }

        function monthlyLines() {
            const lines = [
                {label: hoursLine(state.h), prices: cfg.hours[state.h].prices},
                {label: t.response.title + ': ' + t.response.options[state.r].label, prices: cfg.response[state.r].prices},
            ];

            if (state.c !== 'none') {
                lines.push({label: t.cto.title + ': ' + t.cto.options[state.c].label, prices: cfg.cto[state.c].prices});
            }

            state.a.forEach(key => lines.push({label: t.addons.options[key].label, prices: cfg.addons[key].prices}));

            return lines;
        }

        function oneOffLines() {
            return state.o.map(key => ({label: t.one_off.options[key].label, prices: cfg.one_off[key].prices}));
        }

        function total(lines) {
            const sum = {};
            cfg.currencies.forEach(code => {
                sum[code] = lines.reduce((running, line) => running + line.prices[code], 0);
            });

            return sum;
        }

        function lineElement(line) {
            const row = document.createElement('li');
            row.className = 'flex items-start justify-between gap-4 text-sm text-gray-700 dark:text-gray-300';

            const label = document.createElement('span');
            label.textContent = line.label;
            row.append(label);

            const price = document.createElement('span');
            if (line.prices[money.current] === 0) {
                price.className = 'text-gray-500 dark:text-gray-400 whitespace-nowrap';
                price.textContent = t.response.included;
            } else {
                price.className = 'font-semibold text-gray-900 dark:text-white whitespace-nowrap';
                price.dataset.price = JSON.stringify(line.prices);
            }
            row.append(price);

            return row;
        }

        function queryString() {
            const others = new URLSearchParams(window.location.search);
            ownParams.forEach(name => others.delete(name));

            // Every value below is a configured key, so the literal commas need no escaping.
            const own = ['h=' + state.h, 'r=' + state.r, 'c=' + state.c];
            if (state.a.length) own.push('a=' + state.a.join(','));
            if (state.o.length) own.push('o=' + state.o.join(','));
            own.push('cur=' + money.current);

            const rest = others.toString();

            return own.join('&') + (rest ? '&' + rest : '');
        }

        function syncUrl() {
            const url = new URL(window.location.href);
            url.search = queryString();
            history.replaceState(history.state, '', url);
        }

        let contactNotes = '';

        function contactUrl(monthly, oneOff, oneOffTotal, monthlyTotal) {
            const price = prices => money.format(prices[money.current], money.current).replace(/ /g, ' ');
            const describe = line => line.label + ': ' + (line.prices[money.current] === 0 ? t.response.included : price(line.prices));
            const notes = [t.summary.contact_note, ...monthly.map(describe), t.summary.monthly_total + ': ' + price(monthlyTotal)];

            if (oneOff.length) {
                notes.push(...oneOff.map(describe), t.summary.one_off_total + ': ' + price(oneOffTotal));
            }

            notes.push(t.summary.term, netNote);

            const services = state.c !== 'none' ? [cfg.services.care, cfg.services.cto] : [cfg.services.care];

            contactNotes = notes.join('\n');

            return cfg.contactUrl + '?services=' + services.join(',');
        }

        $('cfg-start').addEventListener('click', () => window.LaragodContactNotes.set(contactNotes));

        function render() {
            const monthly = monthlyLines();
            const oneOff = oneOffLines();
            const monthlyTotal = total(monthly);
            const oneOffTotal = total(oneOff);

            $('cfg-lines').replaceChildren(...monthly.concat(oneOff).map(lineElement));
            $('cfg-monthly-total').dataset.price = JSON.stringify(monthlyTotal);
            $('cfg-one-off-total').dataset.price = JSON.stringify(oneOffTotal);
            $('cfg-one-off-row').classList.toggle('hidden', oneOff.length === 0);
            $('cfg-start').href = contactUrl(monthly, oneOff, oneOffTotal, monthlyTotal);
            money.apply(root);
        }

        root.addEventListener('change', event => {
            const group = event.target.dataset ? event.target.dataset.cfg : null;

            if (!group) {
                return;
            }

            if (Array.isArray(state[group])) {
                state[group] = [...root.querySelectorAll('input[data-cfg="' + group + '"]:checked')].map(input => input.value);
            } else {
                state[group] = event.target.value;
            }

            render();
            syncUrl();
        });

        document.addEventListener('currencychange', () => {
            render();
            syncUrl();
        });

        // Copy link
        const copyButton = $('cfg-copy');
        const copyLabel = copyButton.textContent.trim();
        let copyTimer = null;

        function legacyCopy(text) {
            const field = document.createElement('textarea');
            field.value = text;
            field.setAttribute('readonly', '');
            field.className = 'sr-only';
            document.body.append(field);
            field.select();

            let copied = false;
            try {
                copied = document.execCommand('copy');
            } catch (e) {}

            field.remove();

            return copied;
        }

        copyButton.addEventListener('click', async () => {
            const link = window.location.origin + window.location.pathname + '?' + queryString() + '#configurator';
            let copied = false;

            try {
                await navigator.clipboard.writeText(link);
                copied = true;
            } catch (e) {
                copied = legacyCopy(link);
            }

            if (!copied) {
                // Nothing could write to the clipboard: show the link so it can be copied by hand.
                $('cfg-link').value = link;
                $('cfg-link-row').classList.remove('hidden');
                $('cfg-link').select();

                return;
            }

            copyButton.textContent = t.summary.copied;
            clearTimeout(copyTimer);
            copyTimer = setTimeout(() => {
                copyButton.textContent = copyLabel;
            }, 2000);
        });

        render();

        // Clears invalid values out of an opened link. A plain visit keeps its clean URL.
        if (ownParams.some(name => query.has(name))) {
            syncUrl();
        }
    });
</script>
