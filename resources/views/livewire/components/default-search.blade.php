<form wire:submit.prevent="handleSearching" class="w-3/5">
    <div class="flex items-center shadow-xs rounded-base -space-x-0.5">
        {{-- Search Input --}}
        <input wire:model='search' type="search" id="search" name="search"
            class="px-3 py-2.5 bg-neutral-secondary-medium border rounded-l-base border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full placeholder:text-body"
            placeholder="Search for categories" autocomplete="off">

        {{-- Search Button --}}
        <button wire:loading.remove wire:target='search' type="submit"
            class="w-1/5 cursor-pointer inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-e-base text-sm px-4 py-2.5 focus:outline-none">
            <x-icons.search size="16" class="me-1.5" />
            Search
        </button>

        <button wire:loading wire:target='search' disabled
            class="w-1/5 cursor-not-allowed inline-flex items-center  text-white bg-blue-500 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-e-base text-sm px-4 py-2.5 focus:outline-none">
            <div class="w-4 h-4 border-2 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin">
            </div>
        </button>
    </div>
</form>
