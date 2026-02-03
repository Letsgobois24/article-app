<x-layouts.layout>

    <body class="min-h-screen flex flex-col" x-data="{ sidebarOpen: !window.matchMedia('(max-width: 639px)').matches }">
        <x-dashboard.header />
        <x-dashboard.sidebar />
        <main class="bg-gray-100 p-4 flex-1 sm:px-6 lg:px-8" :class="{ 'sm:ml-64 ml-0': sidebarOpen }">
            {{ $slot }}
        </main>

        {{-- Toaster --}}
        @if (session('status'))
            <x-toaster theme="{{ session('status')['theme'] }}">{{ session('status')['message'] }}</x-toaster>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @livewireScripts
        @livewireChartsScripts
        <script src="{{ asset('js/slugify.js') }}"></script>
    </body>
</x-layouts.layout>
