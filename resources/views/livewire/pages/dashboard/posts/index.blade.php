<div>
    <x-title>My Posts</x-title>

    {{-- Search --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between items-stretch mt-4 mb-6">
        <livewire:components.search-blogs :category='$category' wire:model='search' />

        {{-- Create New Post --}}
        <x-ui.button tag="a" wire:navigate href="/dashboard/posts/create">
            <x-icons.post-add size="24" />
            New Post
        </x-ui.button>
    </div>

    {{-- Posts Table --}}
    <livewire:components.posts-section lazy :search="$search" :category="$category" />
</div>
