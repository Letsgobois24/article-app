@props(['slug', 'href'])

<section x-data="{ isDeleteModal: false }">
    {{-- Button Slot --}}
    <button @click="isDeleteModal=true" {{ $attributes }}>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
        </svg>
        {{ $slot }}
    </button>

    {{-- Delete Modal --}}
    <div x-show="isDeleteModal" x-cloak
        class="bg-black/50 overflow-hidden fixed flex top-0 right-0 left-0 z-20 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <button @click="isDeleteModal=false" type="button"
                    class="absolute top-3 end-2.5 cursor-pointer text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-6 text-body">Are you sure you want to delete this?</h3>
                    <div class="flex items-center space-x-4 justify-center">
                        <form action="{{ $href . '/' . $slug }}" method="POST">
                            @method('delete')
                            @csrf
                            <button
                                class="cursor-pointer text-white bg-red-600 box-border border border-transparent hover:bg-red-700 focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                Yes, I'm sure
                            </button>
                        </form>
                        <button @click="isDeleteModal=false"
                            class="cursor-pointer text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
