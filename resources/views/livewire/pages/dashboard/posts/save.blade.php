<div>
    <x-title>{{ $isEdit ? 'Edit Post' : 'Create New Post' }}</x-title>
    <form wire:submit.prevent='save' class="max-w-5xl grid md:grid-cols-2 gap-x-4 gap-y-1" x-data="{ title: @entangle('title'), slug: @entangle('slug') }">
        @csrf
        {{-- Title --}}
        <div class="col-span-full">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <input wire:model='title' id="title" type="text" name="title" autofocus
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            <p class="text-xs text-red-600 mt-1 h-4">
                @error('title')
                    {{ $message }}
                @enderror
            </p>
        </div>
        {{-- Slug --}}
        <div>
            <label for="slug" class="block text-sm/6 font-medium text-gray-900">Slug</label>
            <div>
                <div class="flex">
                    <input wire:model="slug" x-on:focus="!slug ? slug=slugify(title) : false" id="slug"
                        type="text" name="slug"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    <button x-on:click="slug=slugify(title)" type="button"
                        class="cursor-pointer p-2.5 ml-2 rounded-lg border border-gray-300 bg-white text-gray-600 shadow-sm transition hover:bg-gray-100 hover:text-gray-900 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <x-icons.auto-text size='20' />
                    </button>
                </div>
                <p class="text-xs text-red-600 mt-1 h-4">
                    @error('slug')
                        {{ $message }}
                    @enderror
                </p>

            </div>
        </div>
        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-sm/6 font-medium text-gray-900">Category_id</label>
            <select id="category_id" name="category_id" wire:model='category_id'
                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <option value="" selected>
                    Choose Category
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <p class="text-xs text-red-600 mt-1 h-4">
                @error('category_id')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Post Image --}}
        <div x-data="imagePreview()" class="col-span-full">
            <img x-show="imageUrl" :src="imageUrl" class="mb-3 mx-auto max-w-xl object-cover max-h-96">
            <label class="block mb-2.5 text-sm font-medium text-heading" for="image">Post Image</label>
            <input @change="previewImage" wire:model='image' name="image" id="image" type="file"
                accept="image/*"
                class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body">
            <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, BMP, GIF, or WEBP (MAX. 1 MB).</p>
            <p class="text-xs text-red-600 h-4">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Body --}}
        <div wire:ignore class="col-span-full">
            <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
            <input wire:model='body' class="post-body" id="body" type="hidden" name="body">
            <trix-editor input="body" x-data x-init="$nextTick(() => {
                const editor = $el.editor;
                editor.loadHTML(@js($body));
            })"
                x-on:trix-change="$wire.set('body', $event.target.value)"></trix-editor>
            <p class="text-xs text-red-600 mt-1 h-4">
                @error('body')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Submit --}}
        <x-ui.submit-button target="save" class="col-span-full">Create New Post</x-ui.submit-button>
    </form>
</div>

<script src="{{ asset('js/slugify.js') }}"></script>

<script>
    function imagePreview() {
        return {
            imageUrl: @js(isset($imgUrl) ? asset('storage/' . $imgUrl) : null),
            previewImage(e) {
                const file = e.target.files[0];
                if (file) {
                    this.imageUrl = URL.createObjectURL(file);
                } else {
                    this.imageUrl = null;
                }
            }
        }
    }

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
