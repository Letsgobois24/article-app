<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    {{-- @zinqStyles --}}
    {{-- @zinqHeadScripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap"
        rel="stylesheet" />
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

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

    {{-- @zinqScripts --}}
    <script src="{{ asset('js/slugify.js') }}"></script>
    <script src="https://unpkg.com/vanilla-picker@2"></script>
</body>


</html>
