@extends('layouts.app')

@section('title', 'Blog - DÉMÉ')
@section('description', 'Découvrez nos derniers articles et actualités')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-slate-50 overflow-hidden pt-20">
        <div class="absolute top-0 right-0 h-72 w-72 rounded-full bg-deme-cyan/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-deme-dark/5 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-900 z-10 w-full">
            <p class="mb-4 inline-flex rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Blog</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Blog & actualités</h1>
            <p class="text-xl text-slate-600">Retrouvez nos derniers articles et histoires.</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search & Filter -->
            <div class="mb-12">
                <input type="text" placeholder="Rechercher un article..." class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
            </div>

            <!-- Articles Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                @forelse($posts as $post)
                <div class="bg-white rounded-lg overflow-hidden shadow-premium hover:shadow-premium-lg hover:-translate-y-2 transition-all group">
                    @if($post->featured_image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    @else
                    <div class="h-48 bg-gradient-subtle"></div>
                    @endif
                    
                    <div class="p-6">
                        @if($post->category)
                        <span class="text-xs font-semibold text-deme-cyan uppercase">{{ $post->category->name }}</span>
                        @endif
                        
                        <h3 class="text-xl font-bold text-deme-dark mt-3 mb-3 group-hover:text-deme-cyan transition line-clamp-2">{{ $post->title }}</h3>
                        
                        <p class="text-deme-gray mb-4 line-clamp-3">{{ $post->excerpt ?? substr($post->content, 0, 150) }}</p>
                        
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-deme-gray">{{ $post->published_at->format('d M Y') }}</span>
                            <span class="text-deme-gray">👁️ {{ $post->views }}</span>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('blog.show', $post) }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">
                                Lire l'article →
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-deme-gray text-lg">Aucun article trouvé</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </section>
@endsection
