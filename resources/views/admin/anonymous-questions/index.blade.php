@extends('layouts.admin')
@section('heading', 'Questions Anonymes')
@section('content')
<div class="bg-white rounded-lg shadow-premium overflow-hidden">
    <table class="w-full">
        <thead class="bg-deme-slate">
            <tr>
                <th class="px-6 py-4 text-left font-semibold">Question</th>
                <th class="px-6 py-4 text-left font-semibold">Catégorie</th>
                <th class="px-6 py-4 text-left font-semibold">Réponses</th>
                <th class="px-6 py-4 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($questions as $question)
            <tr class="hover:bg-slate-50">
                <td class="px-6 py-4 line-clamp-2"><strong>{{ substr($question->question, 0, 50) }}...</strong></td>
                <td class="px-6 py-4 text-sm text-deme-gray">{{ $question->category ?? '-' }}</td>
                <td class="px-6 py-4"><span class="text-xs px-3 py-1 rounded-full {{ $question->is_answered ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ $question->answers->count() }}</span></td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.anonymous-questions.edit', $question) }}" class="px-3 py-1 bg-deme-cyan text-deme-dark rounded text-sm">✏️</a>
                        <form action="{{ route('admin.anonymous-questions.destroy', $question) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Sûr?')" class="px-3 py-1 bg-red-500 text-white rounded text-sm">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-deme-gray">Aucune question</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
