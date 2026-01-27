<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Home extends Component
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
        $author_id = auth()->user()->id;

        return view('livewire.pages.dashboard.home', [
            'total_posts_all' => Post::getPostsCount(null, $author_id),
            'total_posts_year' => Post::getPostsCount('year', $author_id),
            'total_posts_month' => Post::getPostsCount('month', $author_id),
            'total_posts_today' => Post::getPostsCount('day', $author_id)
        ])->layoutData(['title' => 'Dashboard Page']);
    }
}
