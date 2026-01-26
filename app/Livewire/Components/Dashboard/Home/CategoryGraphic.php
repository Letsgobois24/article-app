<?php

namespace App\Livewire\Components\Dashboard\Home;

use App\Models\Category;
use App\Models\Post;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class CategoryGraphic extends Component
{
    public function render()
    {
        $stats = Category::select(['name', 'color'])->withCount('posts')->get();

        $chart = (new PieChartModel())
            ->setAnimated(true)
            ->withDataLabels()
            ->setJsonConfig([
                'chart' => ['height' => 440],
            ]);

        foreach ($stats as $stat) {
            $chart->addSlice($stat['name'], (int)$stat['posts_count'], $stat['color']);
        }

        return view('livewire.components.dashboard.home.category-graphic', [
            'chart' => $chart
        ]);
    }
}
