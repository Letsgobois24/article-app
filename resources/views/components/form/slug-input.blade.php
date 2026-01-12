@props(['target' => 'slug', 'from', 'label' => 'Slug'])

<div x-data="{ target: @entangle($target), from: @entangle($from) }">
    <label for="{{ $target }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <div class="flex">
        <input wire:model="{{ $target }}" x-on:focus="!target ? target=slugify(from) : false"
            id="{{ $target }}" type="text" name="slug"
            class=" 
                @error($target) ring-danger border-danger 
                @else border-gray-300 focus:ring-primary-600 focus:border-primary-600 
                @enderror bg-gray-50 border text-gray-900 rounded-lg block w-full p-3 sm:text-sm/6" />
        <button x-on:click="target=slugify(from)" type="button"
            class="cursor-pointer p-3 ml-2 rounded-lg border border-gray-300 bg-white text-gray-600 shadow-sm transition hover:bg-gray-100 hover:text-gray-900 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <x-icons.auto-text size='22' />
        </button>
    </div>
    <p class="text-xs text-red-600 mt-0.5 h-4">
        @error($target)
            {{ $message }}
        @enderror
    </p>
</div>
