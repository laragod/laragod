@props(['items'])

<nav aria-label="Breadcrumb" class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700/50 transition-colors duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <ol class="flex items-center flex-wrap gap-2 text-sm" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach($items as $i => $item)
                <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    @if($item['url'])
                        <a href="{{ $item['url'] }}" itemprop="item" class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </a>
                    @else
                        <span itemprop="name" class="text-gray-900 dark:text-white font-medium">{{ $item['label'] }}</span>
                    @endif
                    <meta itemprop="position" content="{{ $i + 1 }}" />
                </li>
                @if(!$loop->last)
                    <li aria-hidden="true">
                        <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
