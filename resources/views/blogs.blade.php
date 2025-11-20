<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @foreach ($posts as $post)
        <article class="py-8 max-w-4xl border-b-2 border-gray-300 mb-6">
            <a href="/blog/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-2 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            </a>
            <div class="text-gray-600 mb-1">
                <a href="#">{{ $post['author'] }}</a> | {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="mb-4 font-light">{{ Str::limit($post['body'], 200) }}</p>
            <a href="/blog/{{ $post['slug'] }}" class="text-blue-600 font-medium group hover:text-blue-700">Read More
                <span class="group-hover:translate-x-1 inline-block transition">&raquo;</span></a>
        </article>
    @endforeach
</x-layout>
