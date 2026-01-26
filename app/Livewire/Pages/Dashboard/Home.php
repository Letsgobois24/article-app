<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Post;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.home', [
            'total_posts_all' => Post::getPostsCount(),
            'total_posts_month' => Post::getPostsCount('month'),
            'total_posts_year' => Post::getPostsCount('year')
        ])->layoutData(['title' => 'Dashboard Page']);
    }
}
