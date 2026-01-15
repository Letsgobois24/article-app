@props(['category', 'click' => null])

@if ($click)
    <button wire:click="{{ $click }}"
        class="cursor-pointer bg-{{ $category->color }}-100 text-{{ $category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $category->name }}
    </button>
@else
    <a wire:navigate href="/blogs?category={{ $category->slug }}"
        class="bg-{{ $category->color }}-100 text-{{ $category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $category->name }}
    </a>
@endif
