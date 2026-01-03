<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap"
        rel="stylesheet" />
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="h-screen">
    @yield('content')
    <x-navbar.main />
    <header class="px-4 sm:px-6 lg:px-8">
        <x-title>{{ $title }}</x-title>
    </header>
    <main class="bg-gray-100 p-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
