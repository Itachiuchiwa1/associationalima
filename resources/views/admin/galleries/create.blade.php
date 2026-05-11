@extends('layouts.admin')
@section('heading', isset($gallery) ? 'Éditer' : 'Nouvelle')
@section('content')
<form action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-premium max-w-2xl">
    @csrf
    @if(isset($gallery)) @method('PUT') @endif
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Titre</label>
        <input type="text" name="title" value="{{ $gallery->title ?? '' }}" required class="w-full px-4 py-3 border border-slate-200 rounded-lg">
    </div>
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Description</label>
        <textarea name="description" rows="4" class="w-full px-4 py-3 border border-slate-200 rounded-lg">{{ $gallery->description ?? '' }}</textarea>
    </div>
    <div class="mb-6">
        <label class="block font-semibold text-deme-dark mb-2">Image de couverture</label>
        <input type="file" name="cover_image" class="w-full px-4 py-3 border border-slate-200 rounded-lg" accept="image/*">
    </div>
    <div class="flex gap-4">
        <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg">{{ isset($gallery) ? 'Mettre à jour' : 'Créer' }}</button>
        <a href="{{ route('admin.galleries.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg">Annuler</a>
    </div>
</form>
@endsection
