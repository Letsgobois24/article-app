<div class="bg-white p-6 rounded-2xl w-full h-full border border-gray-100 shadow-sm space-y-4">
    <!-- Header -->
    <div class="flex justify-between gap-x-2">
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
        <div class="flex md:flex-row flex-col items-center justify-center gap-2">
            <x-form.select-time model="selectedYear1" :data="$availableYears" />
            <span class="text-gray-700 hidden md:block">&</span>
            <x-form.select-time model="selectedYear2" :data="$availableYears" />
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-gray-50 rounded-xl">
        <livewire:livewire-column-chart key="{{ $chart->reactiveKey() }}" :column-chart-model="$chart" />
    </div>
</div>
