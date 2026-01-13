<div>
    <div class="flex justify-between items-center">
        {{-- Title --}}
        <x-title>My Posts</x-title>
        {{-- Create New Post --}}
        <a wire:navigate href="/dashboard/posts/create"
            class="flex gap-x-1 text-sm items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base px-3.5 py-2.5 focus:outline-none">
            <x-icons.post-add size="24" />
            New Post
        </a>
    </div>

    {{-- Search --}}
    <div class="max-w-3xl mt-4 mb-6">
        <livewire:components.search-blogs :category='$category' wire:model='search' />
    </div>

    {{-- Posts Table --}}
    <div class="relative
        overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
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
                            <x-dashboard.post-dropdown :id="$post->id" :slug="$post->slug" href="/dashboard/posts" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="my-2">
        {{ $posts->links() }}
    </div>
</div>
