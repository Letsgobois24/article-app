<?php

namespace App\Services;

use App\Models\Post;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostService
{
    public function deletePost(int $id): bool
    {
        $post = Post::find($id, ['image']);

        if (!$post) {
            return false;
        }

        if ($post->image) {
            $storage = new SupabaseStorageService;
            $response = $storage->delete($post->image);

            if ($response->failed()) {
                return false;
            }
        }

        Post::destroy($id);
        return true;
    }

    public function createPost($data, TemporaryUploadedFile $image)
    {
        if ($image) {
            $storage = new SupabaseStorageService;

            $fileName = $image->hashName();
            $response = $storage->upload($fileName, $image->get(), $image->getMimeType());
            if ($response->failed()) {
                return false;
            }

            $data['image'] = $fileName;
        }

        $data['author_id'] = auth()->user()->id;
        Post::create($data);

        return true;
    }
}
