<div class="bg-white p-6 rounded-2xl shadow-sm h-full">
    <h3 class="font-semibold mb-4">Summary</h3>

    <livewire:livewire-pie-chart key="{{ $chart->reactiveKey() }}" :pie-chart-model="$chart" />
</div>
