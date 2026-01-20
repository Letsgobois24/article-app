<section>
    <select wire:ignore wire:model.change='selectedYear'>
        @forelse ($availableYears as $year)
            <option value="{{ $year['year'] }}">{{ $year['year'] }}</option>
        @empty
            <option value="">No post yet</option>
        @endforelse
    </select>
    <div class="bg-white p-4 rounded-lg h-96">
        <livewire:livewire-column-chart key="{{ $chart->reactiveKey() }}" :column-chart-model="$chart" />
    </div>
</section>
