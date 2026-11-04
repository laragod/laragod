<x-layouts.app :title="__('audit.meta.title')" :description="__('audit.meta.description')">
    <x-page-hero
        :badge="__('audit.hero.badge')"
        :title-part1="__('audit.hero.title_part1')"
        :title-part2="__('audit.hero.title_part2')"
        :description="__('audit.hero.description')" />

    @php
        $auditConfig = config('offer.audit');

        // Question and answer order comes from the config, wording from lang/.
        $questions = [];
        foreach ($auditConfig['questions'] as $key => $question) {
            $answers = [];
            foreach ($question['answers'] as $answer => $points) {
                $answers[] = ['key' => (string) $answer, 'points' => $points, 'label' => __("audit.questions.{$key}.options.{$answer}")];
            }
            $questions[] = ['key' => $key, 'dimension' => $question['dimension'], 'title' => __("audit.questions.{$key}.title"), 'answers' => $answers];
        }

        $packages = [];
        foreach (config('offer.packages') as $key => $package) {
            $packages[$key] = [
                'title' => __("offer.packages.{$key}.title"),
                'service' => $package['service'],
                'url' => locale_route('pricing') . '#' . $key,
            ];
        }

        $auditData = [
            'questions' => $questions,
            'thresholds' => $auditConfig['thresholds'],
            'recommendations' => $auditConfig['recommendations'],
            'packages' => $packages,
            'contactUrl' => locale_route('contact.show'),
            'nav' => __('audit.nav'),
            'result' => __('audit.result'),
        ];
    @endphp

    <section class="relative bg-gray-50 dark:bg-gray-800 py-16 lg:py-24 transition-colors duration-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Without JS: the questions stay readable but cannot be scored, so point to a call instead --}}
            <noscript>
                <ol class="space-y-6">
                    @foreach($questions as $question)
                        <li class="p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-700/50">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ $question['title'] }}</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($question['answers'] as $answer)
                                    <button type="button" disabled class="px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-400 cursor-not-allowed">{{ $answer['label'] }}</button>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ol>
                <p class="mt-8 text-center">
                    <a href="{{ locale_route('contact.show') }}" class="btn btn-primary">{{ __('audit.result.book_call') }}</a>
                </p>
            </noscript>

            <div id="audit-app" class="hidden scroll-mt-24 bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden"></div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const app = document.getElementById('audit-app');
            const data = @json($auditData);
            const has = (group, key) => Object.prototype.hasOwnProperty.call(group, key);
            const dimensionKeys = Object.keys(data.result.dimensions);
            const levelStyles = {
                good: {
                    card: 'border-primary/30 bg-primary/5',
                    pill: 'bg-primary/10 text-primary',
                },
                watch: {
                    card: 'border-amber-300 bg-amber-50 dark:border-amber-700/60 dark:bg-amber-900/20',
                    pill: 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300',
                },
                risk: {
                    card: 'border-red-300 bg-red-50 dark:border-red-700/60 dark:bg-red-900/20',
                    pill: 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300',
                },
            };

            let answers = {};
            let current = 0;

            function element(tag, className, text) {
                const node = document.createElement(tag);
                if (className) node.className = className;
                if (text !== undefined) node.textContent = text;

                return node;
            }

            function levelFor(points, max) {
                const ratio = points / max;

                if (ratio >= data.thresholds.good) return 'good';
                if (ratio >= data.thresholds.watch) return 'watch';

                return 'risk';
            }

            function score() {
                const levels = {};

                dimensionKeys.forEach(dimension => {
                    const scored = data.questions.filter(question => question.dimension === dimension);
                    const points = scored.reduce((sum, question) => {
                        return sum + question.answers.find(answer => answer.key === answers[question.key]).points;
                    }, 0);

                    levels[dimension] = levelFor(points, scored.length * 2);
                });

                return levels;
            }

            function recommend(levels) {
                if (has(data.recommendations, answers.need)) {
                    return data.recommendations[answers.need];
                }

                return Object.values(levels).includes('risk') ? 'audit' : 'care';
            }

            function contactNotes(levels) {
                const notes = [data.result.contact_note];

                data.questions.forEach(question => {
                    const chosen = question.answers.find(answer => answer.key === answers[question.key]);
                    notes.push(question.title + ' ' + chosen.label);
                });
                dimensionKeys.forEach(dimension => {
                    notes.push(data.result.dimensions[dimension].title + ': ' + data.result.levels[levels[dimension]]);
                });

                return notes.join('\n');
            }

            function focusHeading(heading) {
                heading.focus({preventScroll: true});
                app.scrollIntoView({block: 'nearest', behavior: 'smooth'});
            }

            function renderQuestion(moveFocus) {
                const question = data.questions[current];
                const total = data.questions.length;

                const header = element('div', 'bg-gray-50 dark:bg-gray-800 px-6 lg:px-10 py-4 border-b border-gray-100 dark:border-gray-700');
                const progress = element('p', 'mb-2 text-sm font-medium text-gray-600 dark:text-gray-400', data.nav.progress.replace(':current', current + 1).replace(':total', total));
                const track = element('div', 'w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5');
                const bar = element('div', 'bg-primary h-1.5 rounded-full transition-all duration-300');
                bar.style.width = ((current + 1) / total * 100) + '%';
                track.append(bar);
                header.append(progress, track);

                const body = element('div', 'p-6 lg:p-10');
                const heading = element('h2', 'text-2xl font-heading font-bold text-gray-900 dark:text-white focus:outline-none', question.title);
                heading.tabIndex = -1;

                const list = element('div', 'mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3');
                question.answers.forEach(answer => {
                    const chosen = answers[question.key] === answer.key;
                    const button = element('button', 'w-full text-left px-5 py-4 rounded-xl border-2 font-medium transition-colors hover:border-primary/50 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 dark:focus-visible:ring-offset-gray-900 ' + (chosen ? 'border-primary bg-primary-light/40 text-gray-900 dark:bg-primary/10 dark:text-white' : 'border-gray-200 text-gray-700 dark:border-gray-700 dark:text-gray-300'), answer.label);
                    button.type = 'button';
                    button.setAttribute('aria-pressed', String(chosen));
                    button.addEventListener('click', () => {
                        answers[question.key] = answer.key;

                        if (current + 1 < total) {
                            current += 1;
                            renderQuestion(true);
                        } else {
                            renderResult();
                        }
                    });
                    list.append(button);
                });
                body.append(heading, list);

                if (current > 0) {
                    const back = element('button', 'mt-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium transition-colors rounded focus:outline-none focus-visible:ring-2 focus-visible:ring-primary', '← ' + data.nav.back);
                    back.type = 'button';
                    back.addEventListener('click', () => {
                        current -= 1;
                        renderQuestion(true);
                    });
                    body.append(back);
                }

                app.replaceChildren(header, body);

                if (moveFocus) {
                    focusHeading(heading);
                }
            }

            function renderResult() {
                const levels = score();
                const packageKey = recommend(levels);
                const pack = data.packages[packageKey];

                const body = element('div', 'p-6 lg:p-10');
                const heading = element('h2', 'text-3xl font-heading font-bold text-gray-900 dark:text-white focus:outline-none', data.result.title);
                heading.tabIndex = -1;
                body.append(heading, element('p', 'mt-3 text-gray-600 dark:text-gray-400', data.result.description));

                const dimensions = element('div', 'mt-8 space-y-4');
                dimensionKeys.forEach(dimension => {
                    const copy = data.result.dimensions[dimension];
                    const level = levels[dimension];
                    const card = element('div', 'p-6 rounded-xl border ' + levelStyles[level].card);
                    card.dataset.dimension = dimension;
                    card.dataset.level = level;

                    const top = element('div', 'flex flex-wrap items-center justify-between gap-3');
                    top.append(
                        element('h3', 'text-xl font-heading font-bold text-gray-900 dark:text-white', copy.title),
                        element('span', 'px-3 py-1 rounded-full text-sm font-semibold ' + levelStyles[level].pill, data.result.levels[level]),
                    );
                    card.append(
                        top,
                        element('p', 'mt-2 text-sm font-medium text-gray-700 dark:text-gray-300', copy.question),
                        element('p', 'mt-2 text-gray-600 dark:text-gray-400', copy[level]),
                    );
                    dimensions.append(card);
                });
                body.append(dimensions);

                const recommendation = element('div', 'mt-8 p-6 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-700/50');
                recommendation.dataset.package = packageKey;
                recommendation.append(
                    element('h3', 'text-xl font-heading font-bold text-gray-900 dark:text-white', data.result.recommendation_title),
                );
                const title = element('p', 'mt-3 flex flex-wrap items-center gap-2 font-semibold text-gray-900 dark:text-white');
                title.append(
                    element('span', 'px-3 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-semibold', data.result.recommended),
                    element('span', '', pack.title),
                );
                recommendation.append(title, element('p', 'mt-2 text-gray-600 dark:text-gray-400', data.result.recommendations[packageKey]));

                const actions = element('div', 'mt-6 flex flex-col sm:flex-row sm:flex-wrap gap-3');
                const call = element('a', 'btn btn-primary btn-shimmer', data.result.book_call);
                call.href = data.contactUrl + '?services=' + encodeURIComponent(data.packages[packageKey].service);
                call.addEventListener('click', () => window.LaragodContactNotes.set(contactNotes(levels)));
                const view = element('a', 'btn btn-outline', data.result.view_package);
                view.href = pack.url;
                actions.append(call, view);
                recommendation.append(actions);
                body.append(recommendation);

                const restart = element('button', 'mt-8 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium transition-colors rounded focus:outline-none focus-visible:ring-2 focus-visible:ring-primary', data.nav.restart);
                restart.type = 'button';
                restart.addEventListener('click', () => {
                    answers = {};
                    current = 0;
                    renderQuestion(true);
                });
                body.append(restart);

                app.replaceChildren(body);
                focusHeading(heading);
            }

            app.classList.remove('hidden');
            renderQuestion(false);
        });
    </script>
</x-layouts.app>
