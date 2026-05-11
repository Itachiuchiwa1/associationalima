@extends('layouts.admin')
@section('heading', 'Éditer Témoignage')
@section('content')
<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="bg-white p-8 rounded-lg shadow-premium max-w-2xl">
    @csrf @method('PUT')
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Auteur</label>
        <input type="text" name="author_name" value="{{ $testimonial->author_name }}" required class="w-full px-4 py-3 border border-slate-200 rounded-lg">
    </div>
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Rôle</label>
        <input type="text" name="author_role" value="{{ $testimonial->author_role }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg">
    </div>
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Contenu</label>
        <textarea name="content" rows="6" required class="w-full px-4 py-3 border border-slate-200 rounded-lg">{{ $testimonial->content }}</textarea>
    </div>
    <div class="grid md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block font-semibold text-deme-dark mb-2">Note</label>
            <select name="rating" class="w-full px-4 py-3 border border-slate-200 rounded-lg">
                @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ $testimonial->rating === $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                @endfor
            </select>
        </div>
        <div>
            <label class="block font-semibold text-deme-dark mb-2">Statut</label>
            <select name="status" class="w-full px-4 py-3 border border-slate-200 rounded-lg">
                <option value="pending" {{ $testimonial->status === 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="approved" {{ $testimonial->status === 'approved' ? 'selected' : '' }}>Approuvé</option>
                <option value="rejected" {{ $testimonial->status === 'rejected' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>
    </div>
    <div class="flex gap-4">
        <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg">Mettre à jour</button>
        <a href="{{ route('admin.testimonials.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg">Annuler</a>
    </div>
</form>
@endsection
