<?php

namespace App\Services;

use App\Models\Post;

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
}
