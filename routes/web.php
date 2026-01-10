<?php

use App\Http\Middleware\IsAdmin;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Blog;
use App\Livewire\Pages\Blogs;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Dashboard\Category as DashboardCategory;
use App\Livewire\Pages\Dashboard\Home as DashboardHome;
use App\Livewire\Pages\Dashboard\Posts\Create as CreatePost;
use App\Livewire\Pages\Dashboard\Posts\Edit as EditPost;
use App\Livewire\Pages\Dashboard\Posts\Index as DashboardPost;
use App\Livewire\Pages\Dashboard\Posts\Show as ShowPost;
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
Route::get('/dashboard', DashboardHome::class)->middleware('auth');

Route::get('/dashboard/posts', DashboardPost::class)->middleware('auth')->name('posts-dashboard');
Route::get('/dashboard/posts/create', CreatePost::class)->middleware('auth');
Route::get('/dashboard/posts/{post:slug}/edit', EditPost::class)->middleware('auth');
Route::get('/dashboard/posts/{post:slug}', ShowPost::class)->middleware('auth');

Route::get('/dashboard/categories', DashboardCategory::class)->middleware(IsAdmin::class)->name('categories-dashboard');
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware(IsAdmin::class);
