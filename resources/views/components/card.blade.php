@props(['post'])

<article
    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-col">
    <div class="flex justify-between items-center mb-5 text-gray-500">
        <x-ui.category-badge :post="$post" />
        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline"><a wire:navigate
            href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>

    {{-- Body --}}
    <div class="mb-5 text-gray-500 flex-1">
        {{ Str::limit(Str::of(html_entity_decode($post->body))->stripTags(), 150) }}
    </div>

    {{-- Author Profile --}}
    <a wire:navigate href="/blogs?author={{ $post->author->username }}">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img class="w-7 h-7 rounded-full" src="{{ asset('img/person-logo.png') }}"
                    alt="{{ $post->author->name }}" />
                <span class="font-medium dark:text-white">
                    {{ Str::limit($post->author->name, 18) }}
                </span>
            </div>
            <a wire:navigate href="/blog/{{ $post['slug'] }}"
                class="group inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                Read more
                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </a>

</article>
