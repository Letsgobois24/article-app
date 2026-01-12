@props(['name', 'data', 'option' => 'name', 'empty' => 'Choose an option', 'label'])

<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" wire:model='{{ $name }}'
        class=" 
            @error($name) ring-danger border-danger 
            @else border-gray-300 focus:ring-primary-600 focus:border-primary-600 
            @enderror bg-gray-50 border text-gray-900 rounded-lg block w-full p-3 sm:text-sm/6">
        <option value="" selected>
            {{ $empty }}
        </option>
        @foreach ($data as $item)
            <option value="{{ $item['id'] }}">
                {{ $item[$option] }}
            </option>
        @endforeach
    </select>
    <p class="text-xs text-red-600 mt-0.5 h-4">
        @error($name)
            {{ $message }}
        @enderror
    </p>
</div>
