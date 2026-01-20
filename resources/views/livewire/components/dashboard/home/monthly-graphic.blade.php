<section class="bg-white p-6 rounded-2xl w-full min-h-60 max-h-full border border-gray-100 shadow-sm space-y-4">
    <!-- Header -->
    <div class="flex justify-between items-start">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Your Posts
            </h2>
            <p class="text-sm text-gray-500">
                Statistics for year {{ $selectedYear }}
            </p>
        </div>

        <!-- Select -->
        <div class="relative">
            <select wire:ignore wire:model.change="selectedYear"
                class="appearance-none bg-white border border-gray-200 text-sm font-medium text-gray-700 
                           rounded-xl px-4 py-2 pr-10 shadow-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                           hover:border-gray-300 transition">
                @forelse ($availableYears as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @empty
                    <option value="">No post yet</option>
                @endforelse
            </select>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-gray-50 rounded-xl p-3">
        <livewire:livewire-column-chart key="{{ $chart->reactiveKey() }}" :column-chart-model="$chart" />
    </div>
</section>
