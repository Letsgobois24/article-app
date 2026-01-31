<?php

namespace App\Livewire\Components\Dashboard\Category;

use App\Models\Category;
use App\Services\CategoryService;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    #[Reactive]
    public $search = '';

    public function render()
    {
        // if ($this->search) {
        //     $categories = Category::searching($this->search)->get();
        // } else {
        //     $categories = CategoryService::cacheAll();
        // }

        $categories = Category::searching($this->search)->simplePaginate(5);

        return view('livewire.components.dashboard.category.table', [
            'categories' => $categories
        ]);
    }

    public function resetSearch()
    {
        $this->dispatch('resetSearch');
    }

    #[On('reset-page')]
    public function handleReset()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('components.placeholder.categories-table');
    }
}
