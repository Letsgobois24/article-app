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
    <livewire:components.blogs-section lazy :search="$search" :category="$category" :author="$author" />
</div>
