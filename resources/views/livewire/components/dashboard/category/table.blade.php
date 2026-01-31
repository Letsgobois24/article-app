<section>
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
                @forelse ($categories as $index => $category)
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <td class="px-6 py-4">
                            {{ $categories->firstItem() + $index }}
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
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-18 text-center">
                            <div class="flex flex-col items-center gap-3 text-body">
                                <x-icons.search-off size="44" />
                                <div>
                                    <p class="font-medium text-heading">
                                        Tidak ada data yang cocok
                                    </p>
                                    <p class="text-sm text-body">
                                        Tidak ditemukan kategori dengan kata kunci
                                        <span class="font-medium text-heading">
                                            "{{ $search }}"
                                        </span>
                                    </p>
                                </div>
                                <button wire:click="resetSearch"
                                    class="cursor-pointer mt-2 text-sm font-medium text-primary hover:underline">
                                    Reset pencarian
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="my-2">
        {{ $categories->links(data: ['scrollTo' => false]) }}
    </div>
</section>
