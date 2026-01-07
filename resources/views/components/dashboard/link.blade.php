<a wire:navigate.hover href="{{ $href }}"
    class="{{ $active ? 'bg-blue-600 text-gray-100' : 'text-gray-900 hover:bg-gray-100' }} group flex items-center px-2 py-3 text-base group rounded-lg group">
    <span class="{{ $active ? 'text-gray-100' : 'text-gray-400' }}">
        {{ $icon }}
    </span>
    <span class="ml-3">{{ $slot }}</span>
</a>
