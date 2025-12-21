@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'bg-blue-600 text-gray-100' : 'text-gray-900 hover:bg-gray-50' }} -mx-3 block rounded-lg px-3 py-2 font-semibold">
    {{ $slot }}
</a>
