<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Post;
use App\Services\CategoryService;
use App\Services\SupabaseStorageService;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Layout('components.layouts.dashboard')]
#[Title('Article Edit — Dashboard Artikula')]

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
        ]);
    }

    public function save(SupabaseStorageService $storage)
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
                // Delete object
                $deleteResponse = $storage->delete($this->lastImage);

                if ($deleteResponse->failed()) {
                    session()->flash('status', [
                        'theme' => 'danger',
                        'message' => 'Change image failed!'
                    ]);

                    return $this->redirect(
                        route('post-edit'),
                        navigate: true
                    );
                }
            }

            $newFileName = $this->image->hashName();
            $createResponse = $storage->upload($newFileName, $this->image->get(), $this->image->getMimeType());

            if ($createResponse->failed()) {
                session()->flash('status', [
                    'theme' => 'danger',
                    'message' => 'Change image failed!'
                ]);

                return $this->redirect(
                    route('post-edit'),
                    navigate: true
                );
            }

            $validatedData['image'] = $newFileName;
        } else {
            unset($validatedData['image']);
        }

        Post::where('id', $this->post_id)->update($validatedData);

        session()->flash('status', [
            'theme' => 'success',
            'message' => 'Post has been updated!'
        ]);
        return $this->redirect(
            route('post-show', ['post' => $this->slug]),
            navigate: true
        );
    }
}
