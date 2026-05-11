@extends('layouts.admin')

@section('heading', isset($category) ? 'Éditer la Catégorie' : 'Créer une Catégorie')

@section('content')
    <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-premium max-w-2xl">
        @csrf
        @if(isset($category)) @method('PUT') @endif

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Nom</label>
            <input type="text" name="name" value="{{ $category->name ?? '' }}" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">{{ $category->description ?? '' }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Couleur</label>
            <input type="color" name="color" value="{{ $category->color ?? '#0F3A7D' }}" class="w-20 h-10 rounded-lg border border-slate-200 cursor-pointer">
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Icône</label>
            <input type="text" name="icon" value="{{ $category->icon ?? '' }}" placeholder="📚" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
                {{ isset($category) ? 'Mettre à jour' : 'Créer' }}
            </button>
            <a href="{{ route('admin.categories.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg hover:bg-slate-50 transition-all">
                Annuler
            </a>
        </div>
    </form>
@endsection
