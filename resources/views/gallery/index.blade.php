@extends('layouts.app')

@section('title', 'Galerie - DÉMÉ')
@section('description', 'Découvrez nos médias et galeries')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-slate-50 overflow-hidden pt-20">
        <div class="absolute top-0 right-0 h-72 w-72 rounded-full bg-deme-cyan/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-deme-dark/5 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-900 z-10 w-full">
            <p class="mb-4 inline-flex rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Galerie</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Notre galerie</h1>
            <p class="text-xl text-slate-600">Explorez nos moments et activités en images.</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                @forelse($galleries as $gallery)
                <div class="bg-white rounded-lg overflow-hidden shadow-premium hover:shadow-premium-lg hover:-translate-y-2 transition-all group cursor-pointer">
                    <div class="h-48 bg-gradient-subtle overflow-hidden relative">
                        @if($gallery->cover_image)
                            <img src="{{ asset('storage/' . $gallery->cover_image) }}" alt="{{ $gallery->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-deme-dark to-deme-cyan"></div>
                        @endif
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition flex items-center justify-center">
                            <span class="text-white font-semibold text-lg">{{ $gallery->media->count() }} photos</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-deme-dark group-hover:text-deme-cyan transition">{{ $gallery->title }}</h3>
                        @if($gallery->description)
                        <p class="text-deme-gray text-sm mt-2 line-clamp-2">{{ $gallery->description }}</p>
                        @endif
                        <a href="{{ route('gallery.show', $gallery) }}" class="inline-block text-deme-cyan font-semibold hover:text-deme-dark transition mt-4">
                            Voir la galerie →
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-deme-gray text-lg">Aucune galerie trouvée</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($galleries->hasPages())
            <div class="flex justify-center">
                {{ $galleries->links() }}
            </div>
            @endif
        </div>
    </section>
@endsection
