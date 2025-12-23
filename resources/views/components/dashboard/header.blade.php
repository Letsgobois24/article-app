<nav class="bg-gray-900 z-50 text-gray-100 h-nav">
    {{-- Ketika layar medium --}}
    <div class="flex items-center justify-between px-5 lg:px-8">
        {{-- Logo --}}
        <x-dashboard.side-button />

        <div class="flex md:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                    class="h-8 w-auto" />
            </a>
        </div>

        <a href="/sign-out" class="text-sm/6 font-semibold">Sign Out <span aria-hidden="true">&rarr;</span></a>
    </div>
</nav>
