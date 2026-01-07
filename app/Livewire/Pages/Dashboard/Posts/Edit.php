<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Layout('components.layouts.dashboard')]
class Edit extends Component
{
    use WithFileUploads;

    public $title = '';
    public $slug = '';
    public $category_id = null;
    public $image = null;
    public $body = '';

    public $post;

    public function mount(Post $post)
    {
        $this->title = $post['title'];
        $this->slug = $post['slug'];
        $this->category_id = $post['category_id'];
        $this->image = null;
        $this->body = $post['body'];

        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.posts.save', [
            'categories' => Category::all(['id', 'name']),
            'isEdit' => true,
            'imgUrl' => $this->post->image
        ])
            ->layoutData(['title' => 'Edit Post']);
    }

    public function save()
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->slug, 'slug')],
            'category_id' => ['required'],
            'body' => ['required'],
            'image' => 'nullable|image|max:2048'
        ];

        $validatedData = $this->validate($rules);

        if ($this->image instanceof TemporaryUploadedFile) {
            if ($this->post->image) {
                Storage::delete($this->post->image);
            }

            $validatedData['image'] = $this->image->store('post-images');
        }

        $this->post->update($validatedData);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Post has been updated!'
        ]);
        return $this->redirect(
            route('posts-dashboard'),
            navigate: true
        );
    }
}
