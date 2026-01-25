<?php

namespace App\Livewire\Components\Dashboard\Home;

use App\Models\Post;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;
use Livewire\Component;

class MonthlyGraphic extends Component
{

    public $selectedYear1 = null;
    public $selectedYear2 = null;
    public $availableYears = null;

    public function mount()
    {
        $availableYears = Post::getAvailableYears();

        $this->availableYears = $availableYears;
        $this->selectedYear1 = $availableYears[1];
        $this->selectedYear2 = $availableYears[0];
    }

    public function render()
    {
        $chart = (new ColumnChartModel())
            ->setAnimated(true)
            ->multiColumn()
            ->withDataLabels();

        $data1 = $this->getMonthlyData($this->selectedYear1);
        $data2 = $this->getMonthlyData($this->selectedYear2);

        $sameYear = $this->selectedYear1 == $this->selectedYear2;
        for ($index = 0; $index < 12; $index++) {
            $monthName = Carbon::create()->month($index + 1)->translatedFormat('F');

            $chart->addSeriesColumn($this->selectedYear1, $monthName, $data1[$index]);
            if (!$sameYear) {
                $chart->addSeriesColumn($this->selectedYear2, $monthName, $data2[$index]);
            }
        }

        return view('livewire.components.dashboard.home.monthly-graphic', [
            'chart' => $chart
        ]);
    }

    private function getMonthlyData(int $year)
    {
        $stats = Post::monthlyStats($year, auth()->user()->id)->get();
        $data = array_fill(0, 12, 0);
        foreach ($stats as $stat) {
            $index = (int)$stat['month'] - 1;
            $data[$index] = $stat['total'];
        }
        return $data;
    }

    public function placeholder()
    {
        return view('components.ui.loading-placeholder');
    }
}
