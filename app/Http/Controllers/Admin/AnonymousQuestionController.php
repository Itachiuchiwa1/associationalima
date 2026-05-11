<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnonymousQuestion;
use App\Models\AnonymousAnswer;
use Illuminate\View\View;

class AnonymousQuestionController extends Controller
{
    public function index(): View
    {
        $questions = AnonymousQuestion::with('answers')->latest()->paginate(20);

        return view('admin.anonymous-questions.index', [
            'questions' => $questions,
        ]);
    }

    public function edit(AnonymousQuestion $question): View
    {
        return view('admin.anonymous-questions.edit', [
            'question' => $question,
        ]);
    }

    public function update(AnonymousQuestion $question)
    {
        $data = request()->validate([
            'status' => 'required|in:pending,approved,rejected',
            'answer' => 'nullable|string',
        ]);

        $question->status = $data['status'];
        $question->save();

        if (!empty($data['answer'])) {
            AnonymousAnswer::create([
                'question_id' => $question->id,
                'answer' => $data['answer'],
                'user_id' => auth()->id(),
            ]);

            $question->is_answered = true;
            $question->save();
        }

        return redirect()->route('admin.anonymous-questions.index')->with('success', 'Question mise à jour!');
    }

    public function destroy(AnonymousQuestion $question)
    {
        $question->delete();

        return redirect()->route('admin.anonymous-questions.index')->with('success', 'Question supprimée!');
    }
}
