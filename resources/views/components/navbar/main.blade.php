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
            <x-navbar.link href="/" :active="request()->is('/')">Home</x-navbar.link>
            <x-navbar.link href="/about" :active="request()->is('about')">About</x-navbar.link>
            <x-navbar.link href="/blogs" :active="request()->is('blogs')">Blogs</x-navbar.link>
            <x-navbar.link href="/contact" :active="request()->is('contact')">Contact</x-navbar.link>
        </div>

        @auth
            <div @click="isOpen = !isOpen"
                class="cursor-pointer relative hidden md:flex md:flex-1 md:justify-end md:items-center group">
                {{-- Profile --}}
                <span class="text-sm">{{ auth()->user()->username }}</span>
                <div class="ml-3 mr-0.5 h-9 w-9 overflow-hidden rounded-full group-focus:ring-2">
                    <img src="{{ asset('img/person-logo.png') }}" alt="my-logo" />
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                            d="M12.707 15.707a1 1 0 0 1-1.414 0L5.636 10.05A1 1 0 1 1 7.05 8.636l4.95 4.95l4.95-4.95a1 1 0 0 1 1.414 1.414z" />
                    </g>
                </svg>

                <!-- Dropdown menu -->
                <div x-show="isOpen" x-on:click.outside="isOpen = false"
                    x-transition:enter="transition ease-out duration-200 origin-top-right"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 origin-top-right"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="absolute md:block hidden bg-slate-100 top-11 right-0 rounded-md z-10 w-44 border shadow-lg">
                    <ul class="text-body p-2 text-sm font-medium">
                        <li class="hover:bg-gray-200 rounded-md">
                            <a href="/" class="inline-flex w-full items-center rounded p-2">My Dashboard</a>
                        </li>
                        <li class="hover:bg-gray-200 rounded-md">
                            <a href="/about" class="inline-flex w-full items-center rounded p-2">My Profile</a>
                        </li>
                        <hr class="h-2 text-gray-300">
                        <li class="hover:bg-gray-200 rounded-md">
                            <form action="/sign-out" method="POST">
                                <button type="submit"
                                    class="cursor-pointer inline-flex w-full items-center rounded p-2">Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            {{-- Login --}}
            <a href="/sign-in" class="text-sm/6 font-semibold">Sign in <span aria-hidden="true">&rarr;</span></a>
        @endauth

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
                    <x-navbar.sidelink href="/" :active="request()->is('/')">Home</x-navbar.sidelink>
                    <x-navbar.sidelink href="/about" :active="request()->is('about')">About</x-navbar.sidelink>
                    <x-navbar.sidelink href="/blogs" :active="request()->is('blogs')">Blogs</x-navbar.sidelink>
                    <x-navbar.sidelink href="/contact" :active="request()->is('contact')">Contact</x-navbar.sidelink>
                </div>
                @auth
                    <div class="py-6">
                        <!-- Profile Image -->
                        <div class="flex space-x-5">
                            <div class="h-12 w-12 overflow-hidden rounded-full ring-2">
                                <img src="/img/person-logo.png" alt="my-logo" />
                            </div>
                            <div class="">
                                <h5 class="text-gray-900">{{ auth()->user()->username }}</h5>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <!-- Profile Navigation -->
                        <div class="space-y-2 mt-6">
                            <x-navbar.sidelink href="/dashboard" :active="request()->is('dashoard')">My Dashboard</x-navbar.sidelink>
                            <x-navbar.sidelink href="/profile" :active="request()->is('profile')">My Profile</x-navbar.sidelink>
                        </div>
                    </div>
                @endauth
                <div class="py-6">
                    @auth
                        <form action="/sign-out" method="POST">
                            <button type="submit"
                                class="w-full flex cursor-pointer text-gray-900 hover:bg-gray-50 -mx-3 rounded-lg px-3 py-2 font-semibold">Sign
                                Out</button>
                        </form>
                    @else
                        <a href="/sign-in"
                            class="text-gray-900 hover:bg-gray-50 -mx-3 block rounded-lg px-3 py-2 font-semibold">Sign
                            In</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

</nav>
