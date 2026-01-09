<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SearchBlogs extends Component
{
    #[Modelable]
    public $search = '';

    #[Reactive]
    public $category;

    public function render()
    {
        return view('livewire.components.search-blogs', [
            'categories' => Category::all()
        ]);
    }
}
