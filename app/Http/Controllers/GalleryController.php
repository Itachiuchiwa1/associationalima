<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::with('media')->paginate(12);

        return view('gallery.index', [
            'galleries' => $galleries,
        ]);
    }

    public function show(Gallery $gallery): View
    {
        $gallery->load('media');

        return view('gallery.show', [
            'gallery' => $gallery,
        ]);
    }
}
