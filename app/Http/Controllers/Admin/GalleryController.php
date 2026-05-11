<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::with('media')->latest()->paginate(20);

        return view('admin.galleries.index', [
            'galleries' => $galleries,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.galleries.create', [
            'categories' => $categories,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if (request()->hasFile('cover_image')) {
            $data['cover_image'] = request()->file('cover_image')->store('galleries', 'public');
        }

        $data['slug'] = \Str::slug($data['title']);

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galerie créée!');
    }

    public function edit(Gallery $gallery): View
    {
        $categories = Category::all();

        return view('admin.galleries.edit', [
            'gallery' => $gallery,
            'categories' => $categories,
        ]);
    }

    public function update(Gallery $gallery)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if (request()->hasFile('cover_image')) {
            $data['cover_image'] = request()->file('cover_image')->store('galleries', 'public');
        }

        $data['slug'] = \Str::slug($data['title']);

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galerie mise à jour!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Galerie supprimée!');
    }
}
