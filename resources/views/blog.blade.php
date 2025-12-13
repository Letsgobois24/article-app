<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="px-6 mx-auto max-w-7xl ">
            <article
                class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/blogs" class="text-blue-600 font-medium group hover:text-blue-700 ml-1"><span
                        class="group-hover:-translate-x-1 inline-block transition mr-1">&laquo;</span>Back to blogs
                </a>
                <header class="my-4 lg:mb-6 not-format">
                    <a href="/authors/{{ $post->author->username }}" rel="author">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('img/person-logo.png') }}"
                                    alt="{{ $post->author->name }}">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $post->author->name }}</h3>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $post->author->job }}
                                    </p>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </address>
                    </a>
                </header>
                <a href="/categories/{{ $post->category->slug }}"
                    class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                </a>
                <h1
                    class="my-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}
                </h1>
                <p>{{ $post->body }}</p>
            </article>
        </div>
    </section>

</x-layout>
