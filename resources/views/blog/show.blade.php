@extends('layouts.app')

@section('title', $post->title . ' - DÉMÉ')
@section('description', $post->excerpt ?? substr($post->content, 0, 160))
@if($post->featured_image)
    @section('og_image', asset('storage/' . $post->featured_image))
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden pt-20">
        @if($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover">
        @else
            <div class="absolute inset-0 bg-gradient-hero"></div>
        @endif
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-white z-10 w-full">
            @if($post->category)
            <span class="text-deme-cyan font-semibold text-sm uppercase">{{ $post->category->name }}</span>
            @endif
            <h1 class="text-5xl font-bold mt-3">{{ $post->title }}</h1>
            <p class="text-blue-100 mt-4">{{ $post->published_at->format('d M Y') }} • 👁️ {{ $post->views }} vues</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Article Content -->
            <article class="prose max-w-none mb-12">
                <div class="text-deme-gray leading-relaxed whitespace-pre-wrap">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </article>

            <!-- Author Info -->
            <div class="bg-deme-slate p-8 rounded-lg mb-12 border-l-4 border-deme-cyan">
                <h4 class="font-bold text-deme-dark mb-2">Auteur</h4>
                <p class="text-deme-gray">{{ $post->author->name ?? 'DÉMÉ Team' }}</p>
            </div>

            <!-- Related Posts -->
            @if($relatedPosts->count() > 0)
            <section class="pt-12 border-t border-slate-200">
                <h2 class="text-3xl font-bold text-deme-dark mb-8">Articles Connexes</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $relatedPost)
                    <div class="bg-white rounded-lg overflow-hidden shadow-premium hover:shadow-premium-lg transition-all group">
                        @if($relatedPost->featured_image)
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" alt="{{ $relatedPost->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                            </div>
                        @else
                            <div class="h-40 bg-gradient-subtle"></div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-deme-dark group-hover:text-deme-cyan transition line-clamp-2">{{ $relatedPost->title }}</h3>
                            <p class="text-sm text-deme-gray mt-2">{{ $relatedPost->published_at->format('d M Y') }}</p>
                            <a href="{{ route('blog.show', $relatedPost) }}" class="text-deme-cyan font-semibold text-sm hover:text-deme-dark transition mt-3 inline-block">
                                Lire →
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </section>
@endsection
