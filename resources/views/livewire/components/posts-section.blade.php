<section>
    @if ($posts && count($posts) > 0)
        <div class="relative
            overflow-x-auto shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $index => $post)
                        <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                            <td class="px-6 py-4">
                                {{ $posts->firstItem() + $index }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->category->name }}
                            </td>
                            <td class="px-6 py-4">
                                <x-dashboard.post-dropdown :id="$post->id" :slug="$post->slug"
                                    href="/dashboard/posts" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-col items-center mx-auto">
            <h3 class="text-2xl text-gray-600 font-semibold mb-2">Article Not Found
            </h3>
            <div x-on:click="$dispatch('reset-all')" wire:click='resetPage'
                class="cursor-pointer text-blue-600 font-medium group hover:text-blue-700 ml-1">
                <span class="group-hover:-translate-x-1 inline-block transition mr-1">&laquo;</span>Back to All
            </div>
        </div>
    @endif
    {{-- Pagination --}}
    <div class="my-2">
        {{ $posts->links(data: ['scrollTo' => false]) }}
    </div>
</section>
