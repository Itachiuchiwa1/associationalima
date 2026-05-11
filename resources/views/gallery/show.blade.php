@extends('layouts.app')

@section('title', $gallery->title . ' - Galerie - DÉMÉ')
@section('description', $gallery->description)
@if($gallery->cover_image)
    @section('og_image', asset('storage/' . $gallery->cover_image))
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative h-80 flex items-center justify-center overflow-hidden pt-20">
        @if($gallery->cover_image)
            <img src="{{ asset('storage/' . $gallery->cover_image) }}" alt="{{ $gallery->title }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover">
        @else
            <div class="absolute inset-0 bg-gradient-hero"></div>
        @endif
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white z-10 w-full">
            <h1 class="text-5xl font-bold">{{ $gallery->title }}</h1>
            @if($gallery->description)
            <p class="text-blue-100 mt-3">{{ $gallery->description }}</p>
            @endif
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Media Grid -->
            <div class="grid md:grid-cols-4 gap-6">
                @forelse($gallery->media as $media)
                    @if($media->type === 'image')
                    <div class="relative h-48 rounded-lg overflow-hidden group cursor-pointer shadow-premium hover:shadow-premium-lg transition-all">
                        <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition flex items-center justify-center">
                            <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1110 10A10 10 0 0110 0zm0 18a8 8 0 110-16 8 8 0 0110 16z"></path>
                                <path d="M9 5h2v10H9z"></path>
                                <path d="M5 9h10v2H5z"></path>
                            </svg>
                        </div>
                    </div>
                    @elseif($media->type === 'video')
                    <div class="relative h-48 rounded-lg overflow-hidden group cursor-pointer shadow-premium hover:shadow-premium-lg transition-all bg-black">
                        <video src="{{ asset('storage/' . $media->path) }}" class="w-full h-full object-cover group-hover:opacity-80 transition"></video>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1110 10A10 10 0 0110 0zm4 9l-6 4v-8l6 4z"></path>
                            </svg>
                        </div>
                    </div>
                    @endif
                @empty
                <div class="col-span-4 text-center py-20">
                    <p class="text-deme-gray text-lg">Aucun média dans cette galerie</p>
                </div>
                @endforelse
            </div>

            <!-- Back Button -->
            <div class="mt-16">
                <a href="{{ route('gallery.index') }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">
                    ← Retour à la galerie
                </a>
            </div>
        </div>
    </section>
@endsection
