<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Show extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.posts.show', [
            'title' => 'My Post'
        ])->layoutData(['title' => 'My Post']);
    }
}
