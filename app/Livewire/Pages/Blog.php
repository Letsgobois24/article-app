<?php

namespace App\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.pages.blog', [
            'pageTitle' => 'Single Post'
        ])->title($this->post->title . ' - Artikula');
    }
}
