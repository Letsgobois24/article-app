<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Artikula — A Digital Reading Space for Thoughtful Articles')]

class Home extends Component
{
    public $search = '';

    public function render()
    {
        $popularCategories = Category::postsCategoriesCount()->orderBy('posts_count', 'desc')->limit(4)->get();
        $posts = Post::with(['category', 'author'])->latest()->limit(3)->get();

        return view('livewire.pages.home', [
            'popular_categories' => $popularCategories,
            'latest_posts' => Cache::remember('posts.home', 300, fn() => $posts),
            'total_posts' => Cache::remember('posts.total', 300, fn() => Post::count()),
            'total_posts_year' => Cache::remember('posts.total.year', 300, fn() => Post::getPostsCount('year')),
            'total_categories' => Cache::remember('categories.total', 300, fn() => Category::count()),
            'total_authors' => Cache::remember('authors.total', 300, fn() => User::count()),
        ]);
    }

    public function searching()
    {
        return $this->redirect(
            '/blogs?search=' . $this->search,
            navigate: true,
        );
    }
}
