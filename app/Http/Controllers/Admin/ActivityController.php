<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::with('category')->latest()->paginate(20);

        return view('admin.activities.index', [
            'activities' => $activities,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.activities.create', [
            'categories' => $categories,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        if (request()->hasFile('featured_image')) {
            $data['featured_image'] = request()->file('featured_image')->store('activities', 'public');
        }

        $data['slug'] = \Str::slug($data['title']);

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activité créée!');
    }

    public function edit(Activity $activity): View
    {
        $categories = Category::all();

        return view('admin.activities.edit', [
            'activity' => $activity,
            'categories' => $categories,
        ]);
    }

    public function update(Activity $activity)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        if (request()->hasFile('featured_image')) {
            $data['featured_image'] = request()->file('featured_image')->store('activities', 'public');
        }

        $data['slug'] = \Str::slug($data['title']);

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activité mise à jour!');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activité supprimée!');
    }
}
