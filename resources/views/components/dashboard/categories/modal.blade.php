@props(['isEdit'])

<x-modal.layout title="{{ $isEdit ? 'Edit' : 'Create' }} Category">
    <x-slot:button>
        {{ $slot }}
    </x-slot:button>
    {{-- Loading --}}
    <div class="pt-4 md:pt-6 w-full" wire:loading wire:target="{{ $isEdit ? 'showEditModal' : 'resetForm' }}">
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
    <form wire:submit.prevent='save' class="pt-4 md:pt-6" wire:loading.remove
        wire:target="{{ $isEdit ? 'showEditModal' : 'resetForm' }}" x-data="{ name: @entangle('name'), slug: @entangle('slug') }">
        <x-form.input name="name" label="Category Name" />
        <x-form.slug-input from="name" />
        <x-form.input name="color" label="Color" />
        <x-ui.submit-button target="save">{{ $isEdit ? 'Edit' : 'Create' }}</x-ui.submit-button>
    </form>
</x-modal.layout>
