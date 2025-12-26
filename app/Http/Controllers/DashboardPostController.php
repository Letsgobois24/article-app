<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::without(['author'])->where('author_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts,slug'],
            'category_id' => ['required'],
            'image' => 'image|file|max:2048',
            'body' => ['required']
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['author_id'] = auth()->user()->id;
        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('status', [
            'theme' => 'success',
            'message' => 'New post has been added!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $post = Post::without(['author'])->where('slug', $slug)->firstOrFail();

        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Post::without(['author'])->where('slug', $slug)->firstOrFail();

        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit', [
            'categories' => Category::all(['id', 'name']),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        // $post = Post::without(['author', 'category'])->select('slug')->where('slug', $slug)->firstOrFail();
        $rules = [
            'title' => ['required', 'max:255'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($slug, 'slug')],
            'category_id' => ['required'],
            'body' => ['required']
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $post = Post::without(['author', 'category'])->select('image')->where('slug', $slug)->firstOrFail();
            if ($post->image) {
                Storage::delete($post->image);
            }

            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Post::where('slug', $slug)->update($validatedData);

        return redirect('/dashboard/posts')->with('status', [
            'theme' => 'success',
            'message' => 'Post has been updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('status', [
            'theme' => 'success',
            'message' => 'Post has been deleted succesfully'
        ]);
    }
}
