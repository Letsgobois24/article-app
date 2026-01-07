<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Category;
use Livewire\Component;

class DashboardCategories extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.dashboard-categories', [
            'categories' => Category::all()
        ])->layoutData(['title' => 'Categories Dashboard']);
    }
}
