@props(['isEdit'])

<x-modal.layout title="{{ $isEdit ? 'Edit' : 'Create' }} Category">
    <x-slot:button>
        {{ $slot }}
    </x-slot:button>
    {{-- Loading --}}
    <div class="pt-4 md:pt-6 w-full flex flex-col space-y-2" wire:loading
        wire:target="{{ $isEdit ? 'showEditModal' : 'resetForm' }}">
        <x-form.skeleton-input label="Category Name" />
        <x-form.skeleton-input label="Slug" />
        {{-- Color Picker --}}
        <div class="mb-4.5">
            <label class="block mb-2 text-sm font-medium text-gray-900">Color</label>
            <div class="animate-pulse flex items-center">
                <div class="size-10 bg-gray-200 rounded border shadow-sm mr-2"></div>
                <div class="h-5 bg-gray-300 rounded w-1/5"></div>
            </div>
        </div>
        <button disabled
            class="flex w-full justify-center items-center rounded-md bg-indigo-600 px-3 h-9 text-sm/6 font-semibold text-white shadow-xs">
            <div class="w-4 h-4 border-2 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin">
            </div>
        </button>
    </div>

    {{-- After Loading --}}
    <form wire:submit.prevent='save' class="pt-4 md:pt-6 flex flex-col space-y-2" wire:loading.remove
        wire:target="{{ $isEdit ? 'showEditModal' : 'resetForm' }}" x-data="{ name: @entangle('name'), slug: @entangle('slug') }">
        {{-- Name --}}
        <x-form.input name="name" label="Category Name" />
        {{-- Slug --}}
        <x-form.slug-input from="name" />
        {{-- Color Picker --}}
        <x-form.color-picker name="color" label="Color" />
        <x-ui.submit-button target="save">{{ $isEdit ? 'Edit' : 'Create' }}</x-ui.submit-button>
    </form>
</x-modal.layout>
