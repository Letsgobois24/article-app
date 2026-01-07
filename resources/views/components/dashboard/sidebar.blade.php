<div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
    class="fixed inset-0 bg-black/50 z-5 sm:hidden"></div>

<aside x-show="sidebarOpen" class="w-64 z-20 fixed top-0 h-screen"
    x-transition:enter="transition ease-out duration-200 origin-left" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200 origin-left"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
    <div
        class="overflow-y-auto px-3 h-full flex flex-col bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="py-5 px-2 flex items-center">
            <x-dashboard.side-button />
            <span class="text-gray-900 font-bold text-2xl ml-4">Artikelku</span>
        </div>

        {{-- Sidelink --}}
        <ul class="nav-list space-y-2 py-6">
            <li>
                <x-dashboard.link href="/dashboard">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z" />
                        </svg>
                    </x-slot:icon>
                    Dashboard
                </x-dashboard.link>
            </li>
            <li>
                <x-dashboard.link href="/dashboard/posts" routeActive="dashboard/posts*">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm2-4h7v-2H7zm0-4h10v-2H7zm0-4h10V7H7z" />
                        </svg>
                    </x-slot:icon>
                    My Posts
                </x-dashboard.link>
            </li>
        </ul>

        @can('admin')
            <hr class="border-gray-300">
            <div class="py-6">
                <h6 class="text-gray-400 text-sm px-2 mb-2">ADMINISTRATOR</h6>
                <ul class="nav-list">
                    <li>
                        <x-dashboard.link href="/dashboard/categories">
                            <x-slot:icon>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M6.5 11L12 2l5.5 9zm11 11q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 21.5v-8h8v8z" />
                                </svg>
                            </x-slot:icon>
                            Category
                        </x-dashboard.link>
                    </li>
                </ul>
            </div>
        @endcan

        {{-- Home Button --}}
        <a href="/"
            class="mt-auto mb-4 cursor-pointer mx-auto inline-flex justify-center items-center w-12 h-12
          rounded-full border border-gray-300 text-gray-700
          hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
            </svg>
        </a>

    </div>
</aside>
