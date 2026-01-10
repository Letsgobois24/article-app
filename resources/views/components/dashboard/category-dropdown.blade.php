@props(['category'])

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
        <!-- Edit -->
        <x-modal.layout>
            <x-slot:button>
                <div wire:click='showEditModal({{ $category->id }})'
                    class="flex items-center gap-2 px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 transition">
                    <x-icons.pen size='20' />
                    Edit
                </div>
            </x-slot:button>
            {{-- Loading --}}
            <div class="pt-4 md:pt-6 w-full" wire:loading wire:target='showEditModal'>
                <x-form.skeleton-input label="Category Name" />
                <x-form.skeleton-input label="Slug" />
                <x-form.skeleton-input label="Color" />
                <button disabled
                    class="flex w-full justify-center items-center rounded-md bg-indigo-600 px-3 h-9 text-sm/6 font-semibold text-white shadow-xs">
                    <div class="w-4 h-4 border-2 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin">
                    </div>
                </button>
            </div>

            {{-- After Loading --}}
            <form wire:submit.prevent='update' class="pt-4 md:pt-6" wire:loading.remove wire:target='showEditModal'>
                <x-form.input name="name" label="Category Name" />
                <x-form.input name="slug" label="Slug" />
                <x-form.input name="color" label="Color" />
                <x-ui.submit-button target="update">Edit</x-ui.submit-button>
            </form>
        </x-modal.layout>

        <hr class="border-gray-200">

        {{-- Delete --}}
        <x-delete-confirm :id="$category->id"
            buttonClass="w-full cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition" />
    </div>
</div>
