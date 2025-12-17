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
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->onEachSide(2)->withQueryString(),
    ]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('blog', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
