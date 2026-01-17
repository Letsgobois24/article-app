<section class="pb-4 px-2 mx-auto max-w-7xl lg:px-6">
    {{ $posts->links(data: ['scrollTo' => false]) }}
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 my-4">
        @forelse ($posts as $post)
            {{-- Card --}}
            <x-ui.blog-card.index wire:key="{{ $post->id }}" :post="$post" />
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
