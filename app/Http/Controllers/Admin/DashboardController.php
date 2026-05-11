<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Activity;
use App\Models\Contact;
use App\Models\AnonymousQuestion;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'posts' => Post::count(),
            'activities' => Activity::count(),
            'contacts' => Contact::new()->count(),
            'questions' => AnonymousQuestion::pending()->count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentContacts = Contact::latest()->limit(5)->get();
        $recentQuestions = AnonymousQuestion::latest()->limit(5)->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentContacts' => $recentContacts,
            'recentQuestions' => $recentQuestions,
        ]);
    }
}
