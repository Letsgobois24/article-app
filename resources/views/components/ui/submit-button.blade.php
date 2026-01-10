@props(['target', 'class' => ''])
<button type="submit"
    class="{{ $class }} cursor-pointer flex w-full justify-center items-center rounded-md bg-indigo-600 px-3 h-9 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    <div wire:loading wire:target='{{ $target }}'
        class="w-4 h-4 border-2 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin"></div>
    <span wire:loading.remove wire:target='{{ $target }}'>{{ $slot }}</span>
</button>
