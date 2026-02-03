<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.dashboard')]
#[Title('Tulis Artikel Baru — Dashboard Artikula')]

class Create extends Component
{
    use WithFileUploads;

    #[Validate(['required', 'max:255'])]
    public $title = '';

    #[Validate(['required', 'unique:posts,slug'])]
    public $slug = '';

    #[Validate(['required'])]
    public $category_id = null;

    #[Validate(['required'])]
    public $body = '';

    #[Validate('image|file|max:2048')]
    public $image = null;


    public function render()
    {
        return view('livewire.pages.dashboard.posts.save', [
            'categories' => Category::all(['id', 'name']),
            'isEdit' => false,
        ]);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $validatedData['image'] = $this->image->store('post-images', 'public');
        }

        $validatedData['author_id'] = auth()->user()->id;
        Post::create($validatedData);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'New post has been added!'
        ]);
        return $this->redirect(
            route('posts-dashboard'),
            navigate: true
        );
    }
}
