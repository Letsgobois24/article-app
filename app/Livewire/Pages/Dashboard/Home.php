<?php

namespace App\Livewire\Pages\Dashboard;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Home extends Component
{
    public function render()
    {
        $chart = (new ColumnChartModel())
            ->setTitle('Post per Bulan')
            ->addColumn('Jan', 10, '#f6ad55')
            ->addColumn('Feb', 25, '#fc8181')
            ->addColumn('Mar', 15, '#90cdf4');

        return view('livewire.pages.dashboard.home', ['chart' => $chart])->layoutData(['title' => 'Dashboard Page']);
    }
}
