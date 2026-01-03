<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Blogs extends Component
{
    public function render()
    {
        return view('livewire.pages.blogs', [
            'title' => 'Blog',
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->onEachSide(2)->withQueryString(),
        ]);
    }
}
