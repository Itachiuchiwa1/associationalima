<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('category', 'author')->latest()->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $data['user_id'] = auth()->id();
        $data['slug'] = \Str::slug($data['title']);

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article créé avec succès!');
    }

    public function edit(Post $post): View
    {
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $data['slug'] = \Str::slug($data['title']);

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour avec succès!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Article supprimé avec succès!');
    }
}
