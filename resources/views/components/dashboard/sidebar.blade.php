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
            <span class="text-gray-900 font-bold text-2xl ml-4">Artikula</span>
        </div>

        {{-- Sidelink --}}
        <ul class="nav-list space-y-2 py-6">
            <li>
                <x-dashboard.link :navigate="false" href="/dashboard">
                    <x-slot:icon>
                        <x-icons.dashboard size='24' />
                    </x-slot:icon>
                    Dashboard
                </x-dashboard.link>
            </li>
            <li>
                <x-dashboard.link href="/dashboard/posts" routeActive="dashboard/posts*">
                    <x-slot:icon>
                        <x-icons.post size='24' />
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
                        <x-dashboard.link :navigate="false" href="/admin/dashboard">
                            <x-slot:icon>
                                <x-icons.admin-site size='24' />
                            </x-slot:icon>
                            Dashboard
                        </x-dashboard.link>
                    </li>
                    <li>
                        <x-dashboard.link href="/dashboard/categories">
                            <x-slot:icon>
                                <x-icons.category size='24' />
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
            <x-icons.home size='24' />
        </a>

    </div>
</aside>
