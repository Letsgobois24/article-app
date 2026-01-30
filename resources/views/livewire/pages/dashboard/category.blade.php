<div x-data="{
    isOpenModal: false,
    id: @entangle('id'),
    name: @entangle('name'),
    slug: @entangle('slug'),
    color: @entangle('color'),
    lastColor: @entangle('lastColor'),
    lastSlug: @entangle('lastSlug')
}" @keyup.escape="isOpenModal=false">
    <x-title>Post Categories</x-title>
    <div class="flex justify-between items-center mb-8">
        {{-- Search --}}
        <livewire:components.default-search wire:model='search' />
        {{-- Add Category --}}
        <button
            class="cursor-pointer flex gap-x-1.5 text-sm items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base px-3.5 py-2.5 focus:outline-none"
            wire:click='resetErrorInput'
            x-on:click="
                isOpenModal=true;
                id=null;
                name=''; 
                slug='';
                color='#4A90E2';
                lastColor='#4A90E2';
                ">
            <x-icons.block-plus size='20' />
            New Category
        </button>
    </div>

    {{-- Table --}}
    <livewire:components.dashboard.category.table lazy :search="$search" />

    {{-- Modal --}}
    <div x-show="isOpenModal" x-cloak>
        <x-dashboard.categories.modal />
    </div>
</div>
