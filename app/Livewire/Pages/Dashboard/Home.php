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
        $stats = Post::monthlyStats(2025)->get();

        $data = array_fill(0, 12, 0);
        foreach ($stats as $stat) {
            $index = (int)$stat['month'] - 1;
            $data[$index] = $stat['total'];
        }

        return view('livewire.pages.dashboard.home', [
            'data' => $data
        ])->layoutData(['title' => 'Dashboard Page']);
    }

    // public function render()
    // {
    //     return view('livewire.pages.dashboard.home')->layoutData(['title' => 'Dashboard Page']);
    // }
}
