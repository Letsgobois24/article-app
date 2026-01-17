<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    public function render()
    {
        return view('livewire.pages.dashboard.posts.index')->layoutData(['title' => 'Posts Dashboard']);
    }

    #[On('reset-all')]
    public function resetAll()
    {
        $this->reset();
    }

    #[On('set-category')]
    public function setCategory($slug)
    {
        $this->category = $slug;
    }
}
