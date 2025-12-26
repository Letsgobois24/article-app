@props(['slug', 'href'])

<div class="relative flex justify-center" x-data="{ isDropdown: false }" x-on:click.outside="isDropdown = false">

    <button @click="isDropdown = !isDropdown"
        class="cursor-pointer p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
            class="text-gray-600 dark:text-gray-300">
            <path fill="currentColor" d="M7.5 12L0 4h15z" />
        </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="isDropdown" x-transition
        class="absolute z-20 mt-2 w-36 rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow-lg border border-gray-200">

        <!-- Show -->
        <a href="{{ $href . '/' . $slug }}"
            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
            </svg>
            Show
        </a>

        <hr class="border-gray-200">

        <!-- Edit -->
        <a href="{{ $href . '/' . $slug }}/edit"
            class="flex items-center gap-2 px-4 py-2 text-sm 
                       text-blue-600 dark:text-blue-400
                       hover:bg-blue-50 dark:hover:bg-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-2 2v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
            </svg>
            Edit
        </a>
        <hr class="border-gray-200">

        {{-- Delete --}}
        <x-dashboard.delete-confirm :slug="$slug" :href="$href"
            class="w-full cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
            Delete
        </x-dashboard.delete-confirm>
    </div>
</div>
