@extends('layouts.admin')

@section('heading', isset($post) ? 'Éditer l\'Article' : 'Créer un Article')

@section('content')
    <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-premium max-w-4xl">
        @csrf
        @if(isset($post)) @method('PUT') @endif

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Titre</label>
            <input type="text" name="title" value="{{ $post->title ?? '' }}" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan @error('title') border-red-500 @enderror">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Contenu</label>
            <textarea name="content" rows="10" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan @error('content') border-red-500 @enderror">{{ $post->content ?? '' }}</textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Extrait</label>
            <textarea name="excerpt" rows="3" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">{{ $post->excerpt ?? '' }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block font-semibold text-deme-dark mb-2">Catégorie</label>
                <select name="category_id" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($post->category_id ?? null) === $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold text-deme-dark mb-2">Statut</label>
                <select name="status" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
                    <option value="draft" {{ ($post->status ?? '') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                    <option value="published" {{ ($post->status ?? '') === 'published' ? 'selected' : '' }}>Publié</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-deme-dark mb-2">Image mise en avant</label>
            <input type="file" name="featured_image" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan" accept="image/*">
            @if(isset($post) && $post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="mt-4 h-40 object-cover rounded-lg">
            @endif
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
                {{ isset($post) ? 'Mettre à jour' : 'Créer l\'article' }}
            </button>
            <a href="{{ route('admin.posts.index') }}" class="px-8 py-3 border-2 border-slate-200 text-deme-dark font-bold rounded-lg hover:bg-slate-50 transition-all">
                Annuler
            </a>
        </div>
    </form>
@endsection
