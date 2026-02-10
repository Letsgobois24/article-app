<?php

namespace App\Livewire\Pages\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Services\SupabaseStorageService;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Layout('components.layouts.dashboard')]
#[Title('Create New Article — Dashboard Artikula')]

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
    public TemporaryUploadedFile | null $image = null;

    public function render()
    {
        return view('livewire.pages.dashboard.posts.save', [
            'categories' => Category::all(['id', 'name']),
            'isEdit' => false,
        ]);
    }

    public function save(SupabaseStorageService $storage)
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $fileName = $this->image->hashName();
            $response = $storage->upload($fileName, $this->image->get(), $this->image->getMimeType());
            if ($response->failed()) {
                session()->flash('status', [
                    'theme' => 'danger',
                    'message' => 'Upload failed!'
                ]);

                return $this->redirect(
                    route('post-create'),
                    navigate: true
                );
            }

            $validatedData['image'] = $fileName;

            session()->flash('status', [
                'theme' => 'success',
                'message' => 'New post has been added!'
            ]);
        }

        $validatedData['author_id'] = auth()->user()->id;
        Post::create($validatedData);

        return $this->redirect(
            route('post-show', ['post' => $this->slug]),
            navigate: true
        );
    }
}
