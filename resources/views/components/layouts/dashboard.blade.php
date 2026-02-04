<x-layouts.layout>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <link rel="icon" type="image/png" href="{{ asset('img/logo/logo-only.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap"
            rel="stylesheet" />
        <title>{{ $title ?? 'Artikula - Ruang Baca' }}</title>
    </head>

    {{-- Toaster --}}
    @if (session('status'))
        <x-toaster theme="{{ session('status')['theme'] }}">{{ session('status')['message'] }}</x-toaster>
    @endif

    <<<<<<< HEAD <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireScripts
    @livewireChartsScripts
    <script src="{{ asset('js/slugify.js') }}"></script>
    </body>
</x-layouts.layout>
=======
{{-- Toaster --}}
@if (session('status'))
    <x-toaster theme="{{ session('status')['theme'] }}">{{ session('status')['message'] }}</x-toaster>
@endif

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@livewireScripts
@livewireChartsScripts
<script src="{{ asset('js/slugify.js') }}"></script>
</body>


</html>
>>>>>>> 5a88479
