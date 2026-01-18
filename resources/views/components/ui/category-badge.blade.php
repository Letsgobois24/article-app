@props(['category', 'click' => null])

@if ($click)
    <button wire:click="{{ $click }}" style="background-color: {{ $category->color }}"
        class="cursor-pointer text-gray-800 text-xs font-semibold inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $category->name }}
    </button>
@else
    <a wire:navigate href="/blogs?category={{ $category->slug }}" style="background-color: {{ $category->color }}"
        class="text-gray-800 text-xs font-semibold inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $category->name }}
    </a>
@endif
