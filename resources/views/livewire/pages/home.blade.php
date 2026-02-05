@section('meta_description', 'Jelajahi kumpulan artikel terbaru di Artikula yang membahas teknologi dan pengetahuan.')

<main class="bg-neutral-100 text-gray-800">
    <!-- Hero Section -->
    {{-- <section class="bg-linear-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <img src="{{ asset('img/logo/logo-name.png') }}" alt="Artikula Logo" class="mx-auto w-40 mb-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Artikula: Ruang Baca
            </h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto mb-8">
                Platform penerbitan dan pencarian artikel digital untuk memperluas wawasan,
                berbagi gagasan, dan menemukan inspirasi dalam satu ruang baca.
            </p>

            <!-- Search -->
            <div class="max-w-2xl mx-auto">
                <form class="flex bg-white rounded-xl shadow-lg overflow-hidden">
                    <input type="search" placeholder="Cari artikel atau topik tertentu"
                        class="flex-1 px-5 py-4 text-gray-700 focus:outline-none">
                    <button type="submit"
                        class="cursor-pointer px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </section> --}}

    <!-- Hero Section -->
    {{-- <section class="bg-linear-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20">

            <!-- Hero Content -->
            <div class="grid md:grid-cols-3 gap-12 items-center">

                <!-- Left -->
                <div class="md:col-span-2 place-items-center">
                    <img src="{{ asset('img/logo/logo-name.png') }}" alt="Artikula Logo" class="mx-auto w-40 mb-6">

                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        Artikula: Reading Space
                    </h1>

                    <p class="text-lg text-slate-300 max-w-xl mb-8">
                        A digital article publishing and discovery platform designed to
                        share knowledge, explore ideas, and expand perspectives in one
                        unified reading space.
                    </p>

                    <!-- Search -->
                    <form class="flex bg-white rounded-xl shadow-lg overflow-hidden max-w-xl">
                        <input type="search" placeholder="Search articles, topics, or authors..."
                            class="flex-1 px-5 py-4 text-gray-700 focus:outline-none">
                        <button type="submit"
                            class="px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Right: Stats Cards -->
                <div class="grid grid-cols-1 gap-6">
                    <div class="bg-white/10 backdrop-blur rounded-xl p-6 text-center border border-white/10">
                        <h3 class="text-3xl font-bold text-emerald-400">1,248</h3>
                        <p class="text-sm text-slate-300 mt-1">Published Articles</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur rounded-xl p-6 text-center border border-white/10">
                        <h3 class="text-3xl font-bold text-emerald-400">18</h3>
                        <p class="text-sm text-slate-300 mt-1">Categories</p>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <!-- Hero Section -->
    <section class="bg-linear-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-7xl mx-auto px-6 py-20">

            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- Left Content -->
                <div>
                    <img src="/logo-artikula.png" alt="Artikula Logo" class="w-20 mb-6">

                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        Artikula: Reading Space
                    </h1>

                    <p class="text-lg text-slate-300 max-w-xl mb-8">
                        A digital article publishing and discovery platform that enables
                        readers to explore ideas and writers to share knowledge in one
                        unified space.
                    </p>

                    <!-- Search Bar -->
                    <form class="flex bg-white rounded-xl shadow-lg overflow-hidden max-w-xl">
                        <input type="search" placeholder="Search articles by title, topic, or keyword..."
                            class="flex-1 px-5 py-4 text-gray-700 focus:outline-none">
                        <button type="submit"
                            class="px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Right Stats -->
                <div class="flex gap-6 justify-center md:justify-end">

                    <!-- Published Articles -->
                    <div class="bg-white/10 backdrop-blur rounded-xl p-8 text-center border border-white/10 w-44">
                        <h3 class="text-4xl font-bold text-emerald-400">
                            1,248
                        </h3>
                        <p class="text-sm text-slate-300 mt-2">
                            Published Articles
                        </p>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white/10 backdrop-blur rounded-xl p-8 text-center border border-white/10 w-44">
                        <h3 class="text-4xl font-bold text-emerald-400">
                            18
                        </h3>
                        <p class="text-sm text-slate-300 mt-2">
                            Categories
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Kategori -->
    <section class="max-w-7xl mx-auto px-6 py-14">
        <h2 class="text-2xl font-bold mb-6">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($popularCategories as $category)
                <div class="p-5 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h3 class="font-semibold">{{ $category['name'] }}</h3>
                    <p class="text-sm text-gray-500">AI, Web, Data</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Artikel Terbaru -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-14">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Artikel Terbaru</h2>
                <a href="#" class="text-emerald-600 hover:underline text-sm">
                    Lihat semua
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Card -->
                <article class="border rounded-xl overflow-hidden hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Teknologi</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Mengenal Full-Text Search di PostgreSQL
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            Pembahasan mendalam mengenai pencarian teks menggunakan GIN Index
                            dan tsvector untuk aplikasi modern.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            Oleh <span class="font-medium">Admin</span> • 2 hari lalu
                        </div>
                    </div>
                </article>

                <article class="border rounded-xl overflow-hidden hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Pendidikan</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Literasi Digital di Era Informasi
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            Mengapa kemampuan literasi digital menjadi krusial bagi mahasiswa
                            dan masyarakat umum.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            Oleh <span class="font-medium">Editor</span> • 5 hari lalu
                        </div>
                    </div>
                </article>

                <article class="border rounded-xl overflow-hidden hover:shadow-md transition">
                    <div class="p-5">
                        <span class="text-xs text-emerald-600 font-semibold">Opini</span>
                        <h3 class="font-bold text-lg mt-2 mb-2">
                            Menulis sebagai Medium Berpikir
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3">
                            Menulis bukan sekadar menyampaikan ide, tetapi juga proses
                            merumuskan pemikiran.
                        </p>
                        <div class="mt-4 text-xs text-gray-500">
                            Oleh <span class="font-medium">Kontributor</span> • 1 minggu lalu
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-emerald-600 text-white">
        <div class="max-w-7xl mx-auto px-6 py-16 text-center">
            <h2 class="text-3xl font-bold mb-4">
                Mulai Menulis di Artikula
            </h2>
            <p class="mb-6 text-emerald-100">
                Bagikan pemikiran dan karya tulismu kepada pembaca yang lebih luas.
            </p>
            <a href="#"
                class="inline-block bg-white text-emerald-700 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-50 transition">
                Tulis Artikel
            </a>
        </div>
    </section>
</main>
