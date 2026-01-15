<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    #[Url]
    public $author = '';

    public function render()
    {
        $filter = [
            'search' => $this->search,
            'category' => $this->category,
            'author' => $this->author,
        ];

        $query = Post::filter($filter)->latest();

        if (!$this->search && !$this->category && !$this->author) {
            $posts = Cache::remember('posts.page.' . $this->getPage(), 300, fn() => $query->paginate(6));
        } else {
            $posts = $query->paginate(6);
        }

        return view('livewire.pages.blogs', [
            'title' => 'Blog',
            'posts' => $posts,
        ]);
    }

    #[On('set-category')]
    public function setCategory($slug)
    {
        $this->category = $slug;
        $this->resetPage();
    }

    #[On('set-author')]
    public function setAuthor($username)
    {
        $this->author = $username;
        $this->resetPage();
    }
}
