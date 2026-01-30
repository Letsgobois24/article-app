<div x-data="{
    isOpenModal: false,
    id: @entangle('id'),
    name: @entangle('name'),
    slug: @entangle('slug'),
    color: @entangle('color'),
    lastColor: @entangle('lastColor'),
    lastSlug: @entangle('lastSlug')
}">
    <x-title>Post Categories</x-title>
    <div class="flex justify-between items-center mb-8">
        {{-- Search --}}
        <livewire:components.default-search wire:model='search' />
        {{-- Add Category --}}
        <button
            class="cursor-pointer flex gap-x-1.5 text-sm items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base px-3.5 py-2.5 focus:outline-none"
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
        <!-- Main modal -->
        <div
            class="bg-black/50 overflow-hidden fixed flex top-0 right-0 left-0 z-20 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                        <h3 x-text="id ? 'Edit Category' : 'Add New Category'" class="text-lg font-medium text-heading">
                        </h3>
                        <button x-on:click="isOpenModal=false" type="button"
                            class="cursor-pointer text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                            <x-icons.cross size="20" />
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form wire:submit.prevent='save' class="pt-4 md:pt-6 flex flex-col space-y-2">
                        {{-- Name --}}
                        <x-form.input name="name" label="Category Name" />
                        {{-- Slug --}}
                        <x-form.slug-input from="name" />
                        {{-- Color Picker --}}
                        <x-form.color-picker name="color" label="Color" />
                        <x-ui.submit-button target="save">
                            <span x-text="id ? 'Edit' : 'Create'"></span>
                        </x-ui.submit-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
