<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => "About Page", 'name' => "Rayhan Muhammad Alfarizi"]);
});

Route::get('/blogs', function () {
    return view('blogs', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    // $post = Post::find($slug);
    return view('blog', ['title' => $post['title'], 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
