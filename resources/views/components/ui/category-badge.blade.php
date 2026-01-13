@props(['post', 'click' => null])

@if ($click)
    <button wire:click="{{ $click }}"
        class="cursor-pointer bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $post->category->name }}
    </button>
@else
    <a wire:navigate href="/blogs?category={{ $post->category->slug }}"
        class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
        {{ $post->category->name }}
    </a>
@endif
