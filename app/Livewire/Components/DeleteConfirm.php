<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteConfirm extends Component
{
    public $post;
    public $class;
    // public $isPostsRoute;

    public function mount($post, $class)
    {
        $this->post = $post;
        $this->class = $class;
        // $this->isPostsRoute = request()->routeIs('posts-dashboard');
    }

    public function render()
    {
        return view('livewire.components.delete-confirm');
    }

    public function destroy()
    {
        if ($this->post->image) {
            Storage::delete($this->post->image);
        }

        Post::destroy($this->post->id);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Post has been deleted succesfully'
        ]);

        // $this->dispatch('toast', [
        //     'theme' => 'success',
        //     'message' => 'Post has been deleted succesfully'
        // ]);

        return $this->redirect(
            route('posts-dashboard'),
            navigate: true
        );
    }
}
