<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::approved()->limit(6)->get();
        $recentActivities = Activity::active()->upcoming()->limit(3)->get();
        $recentPosts = Post::published()->latest('published_at')->limit(3)->get();
        $galleries = Gallery::limit(3)->get();

        return view('home', [
            'testimonials' => $testimonials,
            'recentActivities' => $recentActivities,
            'recentPosts' => $recentPosts,
            'galleries' => $galleries,
        ]);
    }
}
