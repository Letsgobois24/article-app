<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class DashboardPosts extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.dashboard-posts', [
            'posts' => Post::without(['author'])->where('author_id', auth()->user()->id)->latest()->get()
        ])->layoutData(['title' => 'Posts Dashboard']);
    }
}
