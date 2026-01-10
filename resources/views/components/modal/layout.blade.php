<div x-data="{ isOpen: false }">
    <button class="w-full cursor-pointer" x-on:click="isOpen=true">
        {{ $button }}
    </button>

    <!-- Main modal -->
    <div x-show="isOpen" x-cloak
        class="bg-black/50 overflow-hidden fixed flex top-0 right-0 left-0 z-20 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div @click.outside="isOpen=false"
                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 class="text-lg font-medium text-heading">
                        Edit Category
                    </h3>
                    <button @click="isOpen=false" type="button"
                        class="cursor-pointer text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                        <x-icons.cross size="20" />
                    </button>
                </div>
                <!-- Modal body -->
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
