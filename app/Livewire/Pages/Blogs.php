<?php

namespace App\Livewire\Pages;

// use App\Livewire\Components\BlogsSection;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Blogs extends Component
{
    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    #[Url]
    public $author = '';

    public function render()
    {
        return view('livewire.pages.blogs', [
            'title' => 'Blog',
        ]);
    }

    #[On('set-category')]
    public function setCategory($slug)
    {
        $this->category = $slug;
    }

    #[On('set-author')]
    public function setAuthor($username)
    {
        $this->author = $username;
    }
}
