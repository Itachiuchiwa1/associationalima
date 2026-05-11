<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnonymousQuestionRequest;
use App\Models\AnonymousQuestion;
use Illuminate\View\View;

class AnonymousQuestionController extends Controller
{
    public function index(): View
    {
        $questions = AnonymousQuestion::approved()->with('answers')->paginate(10);

        return view('anonymous.index', [
            'questions' => $questions,
        ]);
    }

    public function create(): View
    {
        return view('anonymous.create');
    }

    public function store(StoreAnonymousQuestionRequest $request)
    {
        AnonymousQuestion::create([
            'question' => $request->question,
            'category' => $request->category,
            'status' => 'pending',
        ]);

        return redirect()->route('anonymous.index')->with('success', 'Votre question a été reçue et sera modérée.');
    }
}
