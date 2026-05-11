<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $posts = Post::published()->latest('published_at')->paginate(12);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function show(Post $post): View
    {
        if ($post->status !== 'published') {
            abort(404);
        }

        $post->increment('views');
        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
