<nav class="bg-gray-900 text-gray-100" x-data="{ isOpen: false }">
    {{-- Ketika layar medium --}}
    <div class="flex items-center justify-between p-5 lg:px-8">
        {{-- Logo --}}
        <div class="flex md:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                    class="h-8 w-auto" />
            </a>
        </div>
        {{-- Navigasi --}}
        <div class="hidden md:flex md:space-x-12 text-sm/6 font-semibold">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/blogs" :active="request()->is('blogs')">Blogs</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        </div>

        <div class="hidden md:flex md:flex-1 md:justify-end md:items-center">
            {{-- Profile --}}
            <div class="flex mr-6 relative">
                <button @click="isOpen = !isOpen"
                    class="h-9 w-9 overflow-hidden rounded-full cursor-pointer focus:ring-2" type="button">
                    <img src="{{ asset('img/person-logo.png') }}" alt="my-logo" />
                </button>

                <!-- Dropdown menu -->
                <div x-show="isOpen" x-on:click.outside="isOpen = false"
                    x-transition:enter="transition ease-out duration-200 origin-top-right"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 origin-top-right"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="absolute md:block hidden bg-slate-100 top-11 right-0 rounded-md z-10 w-44 border shadow-lg">
                    <ul class="text-body p-2 text-sm font-medium">
                        <li>
                            <a href="/" class="inline-flex w-full items-center rounded p-2">Your Profile</a>
                        </li>
                        <li>
                            <a href="/about" class="inline-flex w-full items-center rounded p-2">Settings</a>
                        </li>
                        <li>
                            <a href="/blog" class="inline-flex w-full items-center rounded p-2">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Login --}}
            <a href="#" class="text-sm/6 font-semibold">Log in <span aria-hidden="true">&rarr;</span></a>
        </div>
        {{-- Hamburger menu --}}
        <div class="flex md:hidden">
            <button @click="isOpen = !isOpen" type="button"
                class="-m-2.5 inline-flex cursor-pointer items-center justify-center rounded-md p-2.5 text-gray-100">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                    aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
    {{-- Ketika layar small --}}
    <div x-show="isOpen" x-on:click.outside="isOpen = false" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-50 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-50 translate-x-full"
        class="fixed md:hidden block inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt=""
                    class="h-8 w-auto" />
            </a>
            <button type="button" @click="isOpen = false"
                class="cursor-pointer -m-2.5 rounded-md p-1 text-gray-700 hover:bg-gray-50">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                    aria-hidden="true" class="size-6">
                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <x-side-nav-link href="/" :active="request()->is('/')">Home</x-side-nav-link>
                    <x-side-nav-link href="/about" :active="request()->is('about')">About</x-side-nav-link>
                    <x-side-nav-link href="/blogs" :active="request()->is('blogs')">Blogs</x-side-nav-link>
                    <x-side-nav-link href="/contact" :active="request()->is('contact')">Contact</x-side-nav-link>
                </div>
                <div class="py-6">
                    <!-- Profile Image -->
                    <div class="flex space-x-5">
                        <div class="h-12 w-12 overflow-hidden rounded-full ring-2">
                            <img src="/img/person-logo.png" alt="my-logo" />
                        </div>
                        <div class="">
                            <h5 class="text-gray-900">Name</h5>
                            <p class="text-sm text-gray-500">name@gmail.com</p>
                        </div>
                    </div>
                    <!-- Profile Navigation -->
                    <div class="space-y-2 mt-6">
                        <x-side-nav-link href="/profile" :active="request()->is('profile')">Your Profile</x-side-nav-link>
                        <x-side-nav-link href="/settings" :active="request()->is('settings')">Settings</x-side-nav-link>
                    </div>
                </div>
                <div class="py-6">
                    <a href="#"
                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                        in</a>
                </div>
            </div>
        </div>
    </div>

</nav>
