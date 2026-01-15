<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $category = '';

    public function render()
    {
        $filter = [
            'search' => $this->search,
            'category' => $this->category,
        ];

        return view('livewire.pages.dashboard.posts.index', [
            'posts' => Post::without(['author'])->where('author_id', auth()->user()->id)->filter($filter)->latest()->paginate(5)
        ])->layoutData(['title' => 'Posts Dashboard']);
    }

    #[On('delete-confirm')]
    public function destroy($id)
    {
        // $post = Post::find($id, ['image']);

        // if ($post->image) {
        //     Storage::delete($post->image);
        // }

        // Post::destroy($id);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Post has been deleted succesfully'
        ]);
        return $this->redirect(
            route('posts-dashboard'),
            navigate: true
        );
    }

    #[On('set-category')]
    public function setCategory($slug)
    {
        $this->category = $slug;
        $this->resetPage();
    }
}
