<div>
    <div class="flex justify-between items-center">
        <x-title>Post Categories</x-title>
        {{-- Add Category --}}
        <x-dashboard.categories.modal :isEdit="false">
            <div wire:click='resetForm'
                class="flex gap-x-1.5 text-sm items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base px-3.5 py-2.5 focus:outline-none">
                <x-icons.block-plus size='20' />
                New Category
            </div>
        </x-dashboard.categories.modal>

    </div>
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
                        <td class="px-6 py-4">
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
</div>
