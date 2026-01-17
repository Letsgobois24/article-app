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
    <livewire:components.posts-section lazy :search="$search" :category="$category" />
</div>
