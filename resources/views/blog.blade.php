<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-8 max-w-4xl mb-6">
        <div class="text-gray-600 mb-1">
            <a href="#">{{ $post['author'] }}</a> | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="mb-4 font-light">{{ $post['body'] }}</p>
        <a href="/blogs" class="text-blue-600 font-medium group hover:text-blue-700 ml-1"><span
                class="group-hover:-translate-x-1 inline-block transition mr-1">&laquo;</span>Back to blogs
        </a>
    </article>

</x-layout>
