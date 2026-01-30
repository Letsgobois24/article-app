<?php

namespace App\Livewire\Components\Dashboard\Category;

use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Table extends Component
{
    #[Reactive]
    public $search = '';

    public function render()
    {
        if ($this->search) {
            $categories = Category::searching($this->search)->get();
        } else {
            $categories = CategoryService::cacheAll();
        }

        return view('livewire.components.dashboard.category.table', [
            'categories' => $categories
        ]);
    }

    public function resetSearch()
    {
        $this->dispatch('resetSearch');
    }

    public function placeholder()
    {
        return view('components.placeholder.categories-table');
    }
}
