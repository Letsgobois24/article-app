<x-layouts.layout>

    <body class="h-screen flex flex-col">
        <x-header.index />
        <header class="px-4 sm:px-6 lg:px-8">
            <x-title>{{ $pageTitle }}</x-title>
        </header>
        <main class="bg-gray-100 p-4 sm:px-6 lg:px-8 flex-1">
            {{ $slot }}
        </main>
        {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script> --}}
    </body>
</x-layouts.layout>
