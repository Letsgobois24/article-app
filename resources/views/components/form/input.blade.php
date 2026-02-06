@props([
    'type' => 'text',
    'name',
    'placeholder' => '',
    'label',
    'class' => '',
    'autofocus' => false,
])

<div class="{{ $class }}">
    <label for="{{ $name }}" class="block mb-1.5 text-sm font-medium text-gray-800">
        {{ $label }}
    </label>

    <input wire:model="{{ $name }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        autocomplete="{{ $name }}" {{ $autofocus ? 'autofocus' : '' }}
        class="
            block w-full rounded-lg px-4 py-3 text-sm text-gray-900
            bg-white border transition
            placeholder:text-gray-400
            focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-600
            @error($name)
                border-red-500 focus:ring-red-500/30 focus:border-red-500
            @else
                border-gray-300
            @enderror
        "
        placeholder="{{ $placeholder }}">

    <p class="mt-1 h-4 text-xs text-red-600">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>
