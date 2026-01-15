<div>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Search Input --}}
    <div class="max-w-3xl mx-auto px-2 lg:px-6 my-2">
        <livewire:components.search-blogs :category='$category' wire:model='search' />
    </div>

    {{-- Filter Section --}}
    <section class="flex flex-wrap items-center gap-2 py-2 h-16 px-2 lg:px-6">
        @if ($search)
            <x-ui.filter-badge action="$set('search', '')" color="bg-blue-100 text-blue-800">
                🔍 Search: {{ $search }}
            </x-ui.filter-badge>
        @endif
        @if ($category)
            <x-ui.filter-badge action="$set('category', '')" color="bg-green-100 text-green-700">
                📁 Category: {{ $category }}
            </x-ui.filter-badge>
        @endif

        @if ($author)
            <x-ui.filter-badge action="$set('author', '')" color="bg-purple-100 text-purple-700">
                ✍️ Author: {{ $author }}
            </x-ui.filter-badge>
        @endif
    </section>

    {{-- Posts Section --}}
    <section class="pb-4 px-2 mx-auto max-w-7xl lg:px-6">
        {{ $posts->links(data: ['scrollTo' => false]) }}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 my-4">
            @forelse ($posts as $post)
                {{-- Card --}}
                <x-blog-card wire:key="{{ $post->id }}" :post="$post" />
            @empty
                <div class="col-span-full mx-auto flex flex-col items-center">
                    <h3 class="text-2xl text-gray-600 font-semibold mb-2">Article Not Found
                    </h3>
                    <a href="/blogs" class="text-blue-600 font-medium group hover:text-blue-700 ml-1"><span
                            class="group-hover:-translate-x-1 inline-block transition mr-1">&laquo;</span>Back to blogs
                    </a>
                </div>
            @endforelse
        </div>
        {{ $posts->links(data: ['scrollTo' => false]) }}
    </section>
</div>
