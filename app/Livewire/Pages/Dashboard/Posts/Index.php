<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Kelola Artikel — Dashboard Artikula')]

class Index extends Component
{
    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    public function render()
    {
        return view('livewire.pages.dashboard.posts.index');
    }

    #[On('set-category')]
    public function setCategory($slug)
    {
        $this->category = $slug;
    }

    #[On('resetSearch')]
    public function resetSearch()
    {
        $this->reset('search');
    }
}
