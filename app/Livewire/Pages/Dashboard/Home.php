<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Home extends Component
{
    public function render()
    {
        $stats = Post::monthlyStats(2026)->get();
        dd($stats);
        return view('livewire.pages.dashboard.home')->layoutData(['title' => 'Dashboard Page']);
    }
}
