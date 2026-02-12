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

    public function createPost($data, TemporaryUploadedFile $image): bool
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

    public function editPost(int $id, $data, TemporaryUploadedFile | null $image, string | null $lastImage): bool
    {
        if ($image instanceof TemporaryUploadedFile) {
            $storage = new SupabaseStorageService;
            if ($lastImage) {
                // Delete object
                $deleteResponse = $storage->delete($lastImage);

                if ($deleteResponse->failed()) {
                    return false;
                }
            }

            // Upload Image
            $newFileName = $image->hashName();
            $uploadResponse = $storage->upload($newFileName, $image->get(), $image->getMimeType());

            if ($uploadResponse->failed()) {
                return false;
            }

            $data['image'] = $newFileName;
        } else {
            unset($data['image']);
        }

        // Update data
        Post::where('id', $id)->update($data);

        return true;
    }
}
