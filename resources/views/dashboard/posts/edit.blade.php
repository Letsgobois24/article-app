<x-dashboard.layout>
    <x-title>Edit Post</x-title>
    <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data"
        class="max-w-5xl grid md:grid-cols-2 gap-x-4 gap-y-1" x-data="{ title: '{{ old('title', $post->title) }}', slug: '{{ old('slug', $post->slug) }}' }">
        @method('put')
        @csrf
        {{-- Title --}}
        <div class="col-span-full">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <input x-model="title" id="title" type="text" name="title" autofocus
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
            <div class="">
                <div class="flex">
                    <input x-model="slug" id="slug" type="text" name="slug"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    <button x-on:click="slug=slugify(title)" type="button"
                        class="cursor-pointer p-2.5 ml-2 rounded-lg border border-gray-300 bg-white text-gray-600 shadow-sm transition hover:bg-gray-100 hover:text-gray-900 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12.68 6h-1.36L7 16h2l.73-2h4.54l.73 2h2zm-2.38 6.5L12 8l1.7 4.5zm7.1 7.9L19 22h-5v-5l2 2c2.39-1.39 4-4.05 4-7c0-4.41-3.59-8-8-8s-8 3.59-8 8c0 2.95 1.61 5.53 4 6.92v2.24C4.47 19.61 2 16.1 2 12C2 6.5 6.5 2 12 2s10 4.5 10 10c0 3.53-1.83 6.62-4.6 8.4" />
                        </svg>
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
            <select id="category_id" name="category_id"
                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach ($categories as $category)
                    <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">
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

        <div x-data="imagePreview(@js(asset('storage/' . $post->image)))" class="col-span-full">
            <img x-show="imageUrl" :src="imageUrl" class="mb-3 mx-auto max-w-xl object-cover max-h-96">
            <label class="block mb-2.5 text-sm font-medium text-heading" for="image">Post Image</label>
            <input @change="previewImage" name="image" id="image" type="file" accept="image/*"
                class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body">
            <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, BMP, GIF, or WEBP (MAX. 1 MB).</p>
            <p class="text-xs text-red-600 h-4">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Body --}}
        <div class="col-span-full">
            <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            <p class="text-xs text-red-600 mt-1 h-4">
                @error('body')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Submit --}}
        <button type="submit"
            class="cursor-pointer mt-4 text-white col-span-full bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
            Update Post
        </button>


    </form>
</x-dashboard.layout>

<script>
    function imagePreview(lastImg = null) {
        return {
            imageUrl: lastImg,
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
</script>

<script src="{{ asset('js/slugify.js') }}">
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
