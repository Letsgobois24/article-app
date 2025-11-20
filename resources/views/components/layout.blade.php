<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap"
        rel="stylesheet" />
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <title>Halaman Home</title>
</head>

<body class="h-screen">
    <x-nav-bar />
    <x-header>{{ $title }}</x-header>
    <main class="bg-gray-100 p-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</body>

</html>
