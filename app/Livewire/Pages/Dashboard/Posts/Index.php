<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard.posts.index', [
            'posts' => Post::without(['author'])->where('author_id', auth()->user()->id)->latest()->get()
        ])->layoutData(['title' => 'Posts Dashboard']);
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Post has been deleted succesfully'
        ]);
        return $this->redirect(
            route('posts-dashboard'),
            navigate: true
        );
    }
}
