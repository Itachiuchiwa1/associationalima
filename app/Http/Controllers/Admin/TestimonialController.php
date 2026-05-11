<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(20);

        return view('admin.testimonials.index', [
            'testimonials' => $testimonials,
        ]);
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    public function update(Testimonial $testimonial)
    {
        $data = request()->validate([
            'author_name' => 'required|string',
            'author_role' => 'nullable|string',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage mis à jour!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage supprimé!');
    }
}
