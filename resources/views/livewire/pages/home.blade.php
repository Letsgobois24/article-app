@section('meta_description', 'Jelajahi kumpulan artikel terbaru di Artikula yang membahas teknologi dan pengetahuan.')

<main class="bg-neutral-100 text-gray-800">
    <!-- Hero Section -->
    <section class="bg-linear-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <img src="{{ asset('img/logo/logo-name.png') }}" alt="Artikula Logo" class="mx-auto w-40 mb-6">

            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Artikula: Reading Space
            </h1>

            <p class="text-lg text-slate-300 max-w-2xl mx-auto mb-8">
                A digital article publishing and discovery platform designed to share ideas,
                expand knowledge, and connect readers through a unified reading space.
            </p>

            <!-- Search -->
            <div class="max-w-2xl mx-auto">
                <form class="flex bg-white rounded-xl shadow-lg overflow-hidden">
                    <input type="search" placeholder="Search articles or topics..."
                        class="flex-1 px-5 py-4 text-gray-700 focus:outline-none">
                    <button type="submit"
                        class="px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="max-w-7xl mx-auto px-6 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 text-center">

            <div class="bg-white rounded-xl shadow p-8">
                <h3 class="text-4xl font-bold text-emerald-600">1,248</h3>
                <p class="mt-2 text-gray-600">Total Articles</p>
            </div>

            <div class="bg-white rounded-xl shadow p-8">
                <h3 class="text-4xl font-bold text-emerald-600">312</h3>
                <p class="mt-2 text-gray-600">Articles This Year</p>
            </div>

            <div class="bg-white rounded-xl shadow p-8">
                <h3 class="text-4xl font-bold text-emerald-600">18</h3>
                <p class="mt-2 text-gray-600">Categories</p>
            </div>
            <div class="bg-white rounded-xl shadow p-8">
                <h3 class="text-4xl font-bold text-emerald-600">18</h3>
                <p class="mt-2 text-gray-600">Categories</p>
            </div>

        </div>
    </section>

    <!-- Popular Categories -->
    <section class="max-w-7xl mx-auto px-6 py-6">
        <h2 class="text-2xl font-bold mb-6">Popular Categories</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($popularCategories as $category)
                <div class="p-5 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h3 class="font-semibold">{{ $category['name'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $category['posts_count'] }} articles</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Latest Articles -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-14">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Latest Articles</h2>
                <a href="#" class="text-emerald-600 hover:underline text-sm">
                    View all
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <article class="border rounded-xl hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Technology</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Understanding Full-Text Search in PostgreSQL
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            A comprehensive guide on implementing text search using GIN Index
                            and tsvector for modern applications.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            By <span class="font-medium">Admin</span> • 2 days ago
                        </div>
                    </div>
                </article>

                <article class="border rounded-xl hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Education</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Digital Literacy in the Information Age
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            Why digital literacy has become a critical skill for students and
                            the general public.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            By <span class="font-medium">Editor</span> • 5 days ago
                        </div>
                    </div>
                </article>

                <article class="border rounded-xl hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Opinion</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Writing as a Tool for Thinking
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            Writing is not only about expressing ideas, but also a process
                            of shaping thoughts.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            By <span class="font-medium">Contributor</span> • 1 week ago
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="bg-emerald-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <h2 class="text-3xl font-bold mb-4">
                Start Writing on Artikula
            </h2>
            <p class="mb-6 text-emerald-100">
                Share your thoughts and articles with a broader audience.
            </p>
            <a href="#"
                class="inline-block bg-white text-emerald-700 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-50 transition">
                Write an Article
            </a>
        </div>
    </section>

</main>
