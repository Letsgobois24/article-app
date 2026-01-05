<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class SearchBlogs extends Component
{
    public function render()
    {
        return view('livewire.components.search-blogs', [
            'categories' => Category::all()
        ]);
    }
}
