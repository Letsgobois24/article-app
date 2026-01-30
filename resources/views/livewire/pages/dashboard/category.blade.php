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
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->slug }}
                        </td>
                        <td class="px-6 py-4 flex items-center">
                            <div class="w-6 h-6 rounded border shadow-sm mr-2"
                                style="background-color: {{ $category->color }}"></div>
                            {{ $category->color }}
                        </td>
                        <td class="px-6 py-4">
                            <x-dashboard.categories.dropdown :category="$category" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div x-show="isOpenModal" x-cloak>
        <x-dashboard.categories.modal />
    </div>
</div>
