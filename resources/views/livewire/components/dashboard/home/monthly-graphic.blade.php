<section class="bg-white p-6 rounded-2xl w-full min-h-60 max-h-full border border-gray-100 shadow-sm space-y-4">
    <!-- Header -->
    <div class="flex justify-between items-start">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Your Posts
            </h2>
            <p class="text-sm text-gray-500">
                Statistics for year
                {{ $selectedYear1 }}{{ $selectedYear2 != $selectedYear1 ? ' & ' . $selectedYear2 : '' }}
            </p>
        </div>

        <!-- Select -->
        <div class="space-x-1">
            <x-form.select-time model="selectedYear1" :data="$availableYears" />
            <span class="text-gray-700">&</span>
            <x-form.select-time model="selectedYear2" :data="$availableYears" />
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-gray-50 rounded-xl p-3">
        <livewire:livewire-column-chart key="{{ $chart->reactiveKey() }}" :column-chart-model="$chart" />
    </div>
</section>
