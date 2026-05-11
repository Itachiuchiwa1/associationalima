<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $activities = Activity::active()->paginate(12);

        return view('activities.index', [
            'activities' => $activities,
            'categories' => $categories,
        ]);
    }

    public function show(Activity $activity): View
    {
        return view('activities.show', [
            'activity' => $activity,
        ]);
    }
}
