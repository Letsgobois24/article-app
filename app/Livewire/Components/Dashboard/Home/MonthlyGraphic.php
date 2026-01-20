<?php

namespace App\Livewire\Components\Dashboard\Home;

use App\Models\Post;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Livewire\Component;

class MonthlyGraphic extends Component
{

    public $selectedYear = null;
    public $availableYears = null;

    public function mount()
    {
        $yearsData = Post::getAvailableYears()->get();

        $availableYears = [];
        foreach ($yearsData as $year) {
            $availableYears[] = $year['year'];
        }

        $this->availableYears = $availableYears;
        $this->selectedYear = $availableYears[0];
    }

    public function render()
    {
        $stats = Post::monthlyStats($this->selectedYear, auth()->user()->id)->get();

        $chart = (new ColumnChartModel())
            ->setJsonConfig([
                'chart' => ['height' => 240],
            ])
            ->setAnimated(true)
            ->withoutLegend();

        for ($month = 0; $month < 12; $month++) {
            $total = $stats->has($month) ? $stats[$month]->total : 0;
            $monthName = Carbon::create()->month($month + 1)->translatedFormat('F');
            $chart->addColumn($monthName, $total, '#60a5fa');
        }

        return view('livewire.components.dashboard.home.monthly-graphic', [
            'chart' => $chart
        ]);
    }

    public function placeholder()
    {
        return view('components.ui.loading-placeholder');
    }
}
