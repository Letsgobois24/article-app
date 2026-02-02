<?php

namespace App\Livewire\Components\Dashboard\Category;

use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Reactive]
    public $search = '';

    public $lastSearch;

    public function render()
    {
        if ($this->lastSearch != $this->search) {
            $this->resetPage();
        }

        if ($this->search) {
            $categories = Category::searching($this->search)->simplePaginate(5);
        } else {
            $categories = CategoryService::pageCache($this->getPage(), 5);
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
