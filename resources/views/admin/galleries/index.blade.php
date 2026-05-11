@extends('layouts.admin')
@section('heading', 'Galeries')
@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold text-deme-dark">Galeries</h2>
    <a href="{{ route('admin.galleries.create') }}" class="px-6 py-3 bg-gradient-hero text-white font-bold rounded-lg">➕ Nouvelle</a>
</div>
<div class="grid md:grid-cols-3 gap-6">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-lg shadow-premium p-6">
        <h3 class="font-bold text-deme-dark mb-2">{{ $gallery->title }}</h3>
        <p class="text-sm text-deme-gray mb-4">{{ $gallery->media->count() }} médias</p>
        <div class="flex gap-2">
            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="flex-1 px-3 py-2 bg-deme-cyan text-deme-dark rounded text-sm text-center">✏️</a>
            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Sûr?')" class="w-full px-3 py-2 bg-red-500 text-white rounded text-sm">🗑️</button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-3 text-center py-12 text-deme-gray">Aucune galerie</div>
    @endforelse
</div>
@endsection
