<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Middleware\IsAdmin;
use App\Models\Post;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// Authentication
Route::get('/sign-in', [SignInController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [SignInController::class, 'authenticate']);
Route::post('/sign-out', [SignInController::class, 'signOut']);

Route::get('/sign-up', [SignUpController::class, 'index'])->middleware('guest');
Route::post('/sign-up', [SignUpController::class, 'store']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware(IsAdmin::class);
