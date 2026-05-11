@extends('layouts.admin')

@section('heading', isset($activity) ? 'Éditer l\'Activité' : 'Créer une Activité')

@section('content')
    <form action="{{ isset($activity) ? route('admin.activities.update', $activity) : route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-premium max-w-4xl">
        @csrf
        @if(isset($activity)) @method('PUT') @endif

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Titre</label>
            <input type="text" name="title" value="{{ $activity->title ?? '' }}" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Description</label>
            <textarea name="description" rows="4" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">{{ $activity->description ?? '' }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Contenu</label>
            <textarea name="content" rows="6" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">{{ $activity->content ?? '' }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block font-semibold text-deme-dark mb-2">Date de l'événement</label>
                <input type="datetime-local" name="event_date" value="{{ $activity->event_date?->format('Y-m-d\TH:i') ?? '' }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
            </div>
            <div>
                <label class="block font-semibold text-deme-dark mb-2">Lieu</label>
                <input type="text" name="location" value="{{ $activity->location ?? '' }}" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block font-semibold text-deme-dark mb-2">Catégorie</label>
                <select name="category_id" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
                    <option value="">Sélectionner</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($activity->category_id ?? null) === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold text-deme-dark mb-2">Statut</label>
                <select name="status" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
                    <option value="active" {{ ($activity->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ ($activity->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Image</label>
            <input type="file" name="featured_image" class="w-full px-4 py-3 border border-slate-200 rounded-lg" accept="image/*">
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg">
                {{ isset($activity) ? 'Mettre à jour' : 'Créer' }}
            </button>
            <a href="{{ route('admin.activities.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg">Annuler</a>
        </div>
    </form>
@endsection
