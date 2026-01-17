<?php

namespace App\Livewire\Components;

use App\Services\CategoryService;
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

        $categories = CategoryService::cacheAll();

        return view('livewire.components.search-blogs', [
            'categories' => $categories
        ]);
    }

    public function resetPage()
    {
        $this->dispatch('reset-page');
    }
}
