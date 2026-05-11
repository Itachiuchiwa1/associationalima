<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $posts = Post::where('status', 'published')->orderByDesc('published_at')->take(100)->get();
        $activities = Activity::where('status', 'active')->orderByDesc('event_date')->take(100)->get();
        $galleries = Gallery::orderByDesc('updated_at')->take(100)->get();

        return response()->view('sitemap', compact('posts', 'activities', 'galleries'))
            ->header('Content-Type', 'application/xml');
    }
}
