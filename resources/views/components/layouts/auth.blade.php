<x-layouts.layout>

    <body class="h-full bg-gray-100">
        <main class="flex min-h-full">
            {{-- Form --}}
            <section
                class="w-full sm:w-1/2 flex flex-col justify-center px-6 py-10 lg:px-8 {{ $isSignInPage ?: 'order-1' }}">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img src="{{ asset('img/logo/logo-only.png') }}" alt="Logo Artikula" class="mx-auto w-20 grayscale-50">
                    <h2 class="mt-4 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                        {{ $isSignInPage ? 'Sign In to Your Account' : 'Create New Account' }}
                    </h2>
                </div>

                <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                    {{ $slot }}
                </div>
            </section>
            <section class="w-1/2 bg-center bg-cover hidden sm:block"
                style="background-image: url('{{ asset('img/auth-img.jpg') }}')">

            </section>
        </main>
    </body>
</x-layouts.layout>
