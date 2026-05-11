@extends('layouts.admin')

@section('heading', 'Catégories')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-deme-dark">Gérer les Catégories</h2>
        <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
            ➕ Nouvelle Catégorie
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @forelse($categories as $category)
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="flex items-center gap-3 mb-3">
                <span class="text-3xl">{{ $category->icon ?? '📂' }}</span>
                <h3 class="font-bold text-deme-dark text-lg">{{ $category->name }}</h3>
            </div>
            <p class="text-deme-gray text-sm mb-4 line-clamp-2">{{ $category->description }}</p>
            <div class="flex gap-2">
                <a href="{{ route('admin.categories.edit', $category) }}" class="flex-1 px-3 py-2 bg-deme-cyan text-deme-dark rounded hover:shadow-glow transition text-center font-semibold text-sm">
                    ✏️
                </a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr?')" class="w-full px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition text-center font-semibold text-sm">
                        🗑️
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 text-deme-gray">
            Aucune catégorie
        </div>
        @endforelse
    </div>
@endsection
