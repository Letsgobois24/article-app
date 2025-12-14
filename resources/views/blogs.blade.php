<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Search Input --}}
    <form x-data="{ category: { name: slugToNormal(@js(request('category'))), slug: @js(request('category')) }, isDropdown: false }" class="max-w-3xl mx-auto px-2 lg:px-6 mt-2">
        <input type="hidden" name="category" x-model="category.slug">
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="flex shadow-xs rounded-base -space-x-0.5">
            <button id="dropdown-button" x-on:click="isDropdown=true" type="button"
                class="relative cursor-pointer inline-flex items-center shrink-0 z-10 text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-s-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                </svg>
                <span x-text="category.name.slice(0,18)"></span>
                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
                <div x-show="isDropdown" x-on:click.outside="isDropdown=false"
                    x-transition:enter="transition ease-out duration-200 origin-top"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 origin-top"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="absolute top-11 left-0 z-10 bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdown-button">
                        <li x-on:click="category = {name: 'All Categories', slug:''}"
                            class="cursor-pointer p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                            All Categories
                        </li>
                        @foreach ($categories as $category)
                            <li x-on:click="category = {name: '{{ $category->name }}', slug: '{{ $category->slug }}'}"
                                class="cursor-pointer p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">
                                {{ $category->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </button>
            <input type="search" id="search" name="search" value="{{ request('search') }}"
                class="px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full placeholder:text-body"
                placeholder="Search for articles" autocomplete="off">
            <button type="submit"
                class="cursor-pointer inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-e-base text-sm px-4 py-2.5 focus:outline-none">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
                Search
            </button>
        </div>
    </form>
    <section class="py-8 px-2 mx-auto max-w-7xl lg:py-16 lg:px-6">
        {{ $posts->links() }}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 my-4">
            @forelse ($posts as $post)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/blogs?category={{ $post->category->slug }}"
                            class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            {{ $post->category->name }}
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline"><a
                            href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400 flex-1">
                        {{ Str::limit($post->body, 150) }}
                    </p>
                    <a href="/blogs?author={{ $post->author->username }}">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <img class="w-7 h-7 rounded-full" src="{{ asset('img/person-logo.png') }}"
                                    alt="{{ $post->author->name }}" />
                                <span class="font-medium dark:text-white">
                                    {{ Str::limit($post->author->name, 18) }}
                                </span>
                            </div>
                    </a>
                    <a href="/blog/{{ $post['slug'] }}"
                        class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </article>
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
        {{ $posts->links() }}
    </section>
    <script>
        function slugToNormal(slug) {
            const categories = @js($categories);
            const category = categories.find(category => category.slug == slug);
            if (category) {
                return category.name;
            };
            return 'All Categories';
        }
    </script>
</x-layout>
