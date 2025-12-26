<x-dashboard.layout>
    <x-title>My Post</x-title>
    <section class="px-6 pt-6 pb-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-7xl ">
            <article
                class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <div class="flex space-x-2">
                    {{-- Back --}}
                    <a href="/dashboard/posts"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium
                  text-gray-700 border border-gray-300 rounded-lg
                  hover:bg-gray-100 transition">
                        &laquo; Back
                    </a>

                    {{-- Edit --}}
                    <a href="/dashboard/posts/{{ $post->slug }}/edit"
                        class="inline-flex items-center gap-x-1 px-4 py-2 text-sm font-medium
              text-white bg-blue-600 rounded-lg
              hover:bg-blue-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                        </svg>
                        Edit
                    </a>

                    {{-- Delete --}}
                    <x-dashboard.delete-confirm :slug="$post->slug"
                        class="cursor-pointer inline-flex items-center gap-x-1 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition">
                        Delete
                    </x-dashboard.delete-confirm>

                </div>
                <a href="/blogs?category={{ $post->category->slug }}"
                    class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-1 mt-6 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                </a>

                {{-- Post Body --}}
                {{-- Body Title --}}
                <h1
                    class="my-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}
                </h1>
                {{-- Body Image --}}
                @if ($post->image)
                    <img class="w-xl max-h-96 my-6 mx-auto object-cover" src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title . ' Post Image' }}">
                @endif
                {{-- Body Text --}}
                <div>
                    {{ Str::of($post->body)->toHtmlString() }}
                </div>
            </article>
        </div>
    </section>
</x-dashboard.layout>
