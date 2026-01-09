<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Category extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.category', [
            'categories' => Category::all()
        ]);
    }
}
