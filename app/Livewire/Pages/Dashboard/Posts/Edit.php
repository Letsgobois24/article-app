<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Post;
use App\Services\CategoryService;
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
    public $lastImage = null;
    public $body = '';
    public $post_id = null;

    public function mount(Post $post)
    {
        $this->title = $post['title'];
        $this->slug = $post['slug'];
        $this->category_id = $post['category_id'];
        $this->lastImage = $post['image'] ?? null;
        $this->body = $post['body'];
        $this->post_id = $post['id'];
    }

    public function render()
    {
        $categories = CategoryService::cacheAll();

        return view('livewire.pages.dashboard.posts.save', [
            'categories' => $categories,
            'isEdit' => true,
        ])
            ->layoutData(['title' => 'Edit Post']);
    }

    public function save()
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->post_id)],
            'category_id' => ['required'],
            'body' => ['required'],
            'image' => 'nullable|image|max:2048'
        ];

        $validatedData = $this->validate($rules);

        if ($this->image instanceof TemporaryUploadedFile) {
            if ($this->lastImage) {
                Storage::delete($this->lastImage);
            }

            $validatedData['image'] = $this->image->store('post-images');
        }

        Post::where('id', $this->post_id)->update($validatedData);

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
