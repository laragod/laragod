@props(['items'])

@php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn (array $item): array => [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['answer']],
        ], array_values($items)),
    ];
@endphp

<script type="application/ld+json">{!! json_encode($faqSchema, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
