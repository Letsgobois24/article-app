@props(['colspan', 'search'])

<tr>
    <td colspan="{{ $colspan }}" class="px-6 py-18 text-center">
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
            <button wire:click="$dispatch('resetSearch')"
                class="cursor-pointer mt-2 text-sm font-medium text-primary hover:underline">
                Reset pencarian
            </button>
        </div>
    </td>
</tr>
