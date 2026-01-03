<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Middleware\IsAdmin;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\Blogs;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\SignIn;
use App\Livewire\Pages\SignUp;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/blogs', Blogs::class)->name('blogs');
Route::get('/blog/{post:slug}', Blog::class)->name('blog');
Route::get('/contact', Contact::class)->name('contact');

// Authentication
Route::get('/sign-in', SignIn::class)->name('login')->middleware('guest');
Route::get('/sign-up', SignUp::class)->middleware('guest');

Route::post('/sign-in', [SignInController::class, 'authenticate']);
Route::post('/sign-out', [SignInController::class, 'signOut']);

Route::post('/sign-up', [SignUpController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware(IsAdmin::class);
