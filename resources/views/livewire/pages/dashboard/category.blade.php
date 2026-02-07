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
    <div class="flex justify-between items-stretch mb-8">
        {{-- Search --}}
        <livewire:components.default-search wire:model='search' />
        {{-- Add Category --}}
        <x-ui.button wire:click='resetErrorInput'
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
        </x-ui.button>
    </div>

    {{-- Table --}}
    <livewire:components.dashboard.category.categories-table lazy :search="$search" />

    {{-- Modal --}}
    <div x-show="isOpenModal" x-cloak>
        <x-dashboard.categories.modal />
    </div>
</div>
