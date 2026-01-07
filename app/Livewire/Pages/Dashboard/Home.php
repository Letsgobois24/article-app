<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.home')->layoutData(['title' => 'Dashboard Page']);
    }
}
