@props(['name' => 'password', 'placeholder' => 'Your password', 'label' => 'Password', 'class' => ''])

<div class="{{ $class }}">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <div x-data="{ show: false }" class="relative">
        <div x-on:click="show=!show" class="cursor-pointer">
            <hr x-show="!show" x-transition:enter="transition-transform ease-out duration-100"
                x-transition:enter-start="scale-x-0" x-transition:enter-end="scale-x-100"
                x-transition:leave="transition-transform ease-in duration-100" x-transition:leave-start="scale-x-100"
                x-transition:leave-end="scale-x-0"
                class="w-5 transition z-5 border border-dark h-0 -rotate-45 absolute top-1/2 -translate-y-1/2 right-4">
            <x-icons.eye size="20" class="text-gray-400 absolute top-1/2 -translate-y-1/2 right-4" />
        </div>
        <input wire:model="{{ $name }}" :type="show ? 'text' : 'password'" name="{{ $name }}"
            id="{{ $name }}" autocomplete="{{ $name }}"
            class=" 
                @error($name) ring-danger border-danger 
                @else border-gray-300 focus:ring-primary-600 focus:border-primary-600 
                @enderror bg-gray-50 border text-gray-900 rounded-lg block w-full p-3 sm:text-sm/6"
            :placeholder="show ? @js($placeholder) : '••••••••'">
    </div>
    <p class="text-xs text-red-600 mt-0.5 h-4">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>
