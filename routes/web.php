<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => "About Page", 'name' => "Rayhan Muhammad Alfarizi"]);
});

Route::get('/blogs', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();

    return view('blogs', [
        'title' => 'Blog',
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(3)->onEachSide(2)->withQueryString(),
        'categories' => Category::all(['slug', 'name'])
    ]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('blog', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load('category', 'author');
    $posts = $user->posts;
    return view('blogs', ['title' => count($posts) . ' Articles by ' . $user->name, 'posts' => $posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load('category', 'author');
    $posts = $category->posts;
    return view('blogs', ['title' => 'Categories: ' . $category->name, 'posts' => $posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
