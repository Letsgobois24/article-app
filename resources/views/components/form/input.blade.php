@props(['type' => 'text', 'name', 'placeholder' => '', 'label', 'class' => ''])

<div class="{{ $class }}">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input wire:model="{{ $name }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        autocomplete="{{ $name }}"
        class=" 
            @error($name) ring-danger border-danger 
            @else border-gray-300 focus:ring-primary-600 focus:border-primary-600 
            @enderror bg-gray-50 border text-gray-900 rounded-lg block w-full p-2.5 sm:text-sm/6"
        placeholder="{{ $placeholder }}">
    <p class="h-4 text-xs text-fg-danger-strong">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>
