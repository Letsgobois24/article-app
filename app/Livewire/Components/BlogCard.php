<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Livewire\Component;

class BlogCard extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.components.blog-card');
    }
}
