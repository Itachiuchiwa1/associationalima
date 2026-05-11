@extends('layouts.admin')
@section('heading', 'Éditer Question')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white p-8 rounded-lg shadow-premium mb-6">
        <h3 class="text-lg font-bold text-deme-dark mb-4">Question</h3>
        <p class="text-deme-gray mb-4">{{ $question->question }}</p>
        @if($question->category)
        <span class="text-xs text-deme-cyan font-semibold uppercase">{{ $question->category }}</span>
        @endif
    </div>

    <form action="{{ route('admin.anonymous-questions.update', $question) }}" method="POST" class="bg-white p-8 rounded-lg shadow-premium">
        @csrf @method('PUT')
        
        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Répondre</label>
            <textarea name="answer" rows="6" class="w-full px-4 py-3 border border-slate-200 rounded-lg"></textarea>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Statut</label>
            <select name="status" class="w-full px-4 py-3 border border-slate-200 rounded-lg">
                <option value="pending" {{ $question->status === 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="approved" {{ $question->status === 'approved' ? 'selected' : '' }}>Approuvée</option>
                <option value="rejected" {{ $question->status === 'rejected' ? 'selected' : '' }}>Rejetée</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg">Mettre à jour</button>
            <a href="{{ route('admin.anonymous-questions.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg">Retour</a>
        </div>
    </form>
</div>
@endsection
