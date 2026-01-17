<?php

namespace App\Livewire\Components;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class PostsSection extends Component
{
    use WithPagination;

    #[Reactive]
    public $search = '';

    #[Reactive]
    public $category = '';

    public function render()
    {
        $filter = [
            'search' => $this->search,
            'category' => $this->category,
        ];

        return view('livewire.components.posts-section', [
            'posts' => Post::without(['author'])->where('author_id', auth()->user()->id)->filter($filter)->latest()->paginate(5)
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="w-full h-48 flex justify-center items-center">
            <!-- Loading spinner... -->
            <div class="w-10 h-10 m-auto border-4 mx-auto border-gray-300 border-t-blue-600 rounded-full animate-spin">
            </div>
        </div>
        HTML;
    }

    #[On('delete-confirm')]
    public function destroy($id)
    {
        $post = Post::find($id, ['image']);

        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($id);

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
