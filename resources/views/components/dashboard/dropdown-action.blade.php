@props(['slug', 'id', 'href' => null, 'showable' => true])

<div class="relative flex justify-center" x-data="{ isDropdown: false }" x-on:click.outside="isDropdown = false">
    <button @click="isDropdown = !isDropdown"
        class="cursor-pointer p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" class="text-gray-600">
            <path fill="currentColor" d="M7.5 12L0 4h15z" />
        </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="isDropdown" x-cloak x-transition
        class="absolute z-20 mt-2 w-36 rounded-lg bg-white dark:bg-gray-800 overflow-hidden shadow-lg border border-gray-200">
        {{-- Navigate --}}
        <!-- Show -->
        @if ($showable)
            @if ($href)
                <a wire:navigate href="{{ $href . '/' . $slug }}"
                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                    <x-icons.eye size='20' />
                    Show
                </a>
            @else
                <button
                    class="w-full cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                    <x-icons.eye size='20' />
                    Show
                </button>
            @endif
        @endif

        <hr class="border-gray-200">

        <!-- Edit -->
        @if ($href)
            <a wire:navigate href="{{ $href . '/' . $slug }}/edit"
                class="flex items-center gap-2 px-4 py-2 text-sm 
                       text-blue-600hover:bg-blue-50 transition">
                <x-icons.pen size='20' />
                Edit
            </a>
        @else
            <x-modal.layout>
                <x-slot:button>
                    <div class="flex items-center gap-2 px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 transition">
                        <x-icons.pen size='20' />
                        Edit
                    </div>
                </x-slot:button>
                <form class="pt-4 md:pt-6">
                    <x-form.input name="name" label="Category Name" />
                    <x-form.input name="slug" label="Slug" />
                    <x-form.input name="color" label="Color" />
                    <x-ui.submit-button target="save">Edit</x-ui.submit-button>
                </form>
            </x-modal.layout>
        @endif

        <hr class="border-gray-200">

        {{-- Delete --}}
        <x-delete-confirm :id="$id"
            buttonClass="w-full cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition" />
    </div>
</div>
