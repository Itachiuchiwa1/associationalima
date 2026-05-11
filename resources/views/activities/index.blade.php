@extends('layouts.app')

@section('title', 'Nos Actions - DÉMÉ')
@section('description', 'Découvrez toutes nos activités et actions humanitaires')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-slate-50 overflow-hidden pt-20">
        <div class="absolute -top-20 left-0 h-60 w-60 rounded-full bg-deme-cyan/10 blur-3xl"></div>
        <div class="absolute -bottom-20 right-0 h-72 w-72 rounded-full bg-deme-dark/5 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-900 z-10 w-full">
            <p class="mb-4 inline-flex rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Actions et initiatives</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Nos actions</h1>
            <p class="text-xl text-slate-600">Découvrez nos activités et nos initiatives communautaires</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search & Filter -->
            <div class="mb-12 flex flex-col sm:flex-row gap-4 items-center justify-between">
                <input type="text" placeholder="Rechercher une activité..." class="flex-1 px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan">
                
                <div class="flex gap-2">
                    <button class="px-4 py-3 bg-deme-dark text-white rounded-lg hover:shadow-glow transition-all">Tous</button>
                    @foreach($categories as $category)
                    <button class="px-4 py-3 border-2 border-slate-200 text-deme-gray rounded-lg hover:border-deme-cyan transition-all">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>

            <!-- Activities Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                @forelse($activities as $activity)
                <div class="bg-white rounded-lg overflow-hidden shadow-premium hover:shadow-premium-lg hover:-translate-y-2 transition-all group">
                    <div class="h-48 bg-gradient-subtle overflow-hidden relative">
                        @if($activity->featured_image)
                            <img src="{{ asset('storage/' . $activity->featured_image) }}" alt="{{ $activity->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-deme-dark to-deme-cyan"></div>
                        @endif
                        @if($activity->category)
                        <div class="absolute top-4 right-4 bg-deme-cyan text-deme-dark px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $activity->category->name }}
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-deme-dark mb-2 group-hover:text-deme-cyan transition line-clamp-2">{{ $activity->title }}</h3>
                        <p class="text-deme-gray mb-4 line-clamp-3">{{ $activity->description }}</p>
                        
                        <div class="space-y-2 text-sm text-deme-gray mb-4">
                            @if($activity->event_date)
                            <p>📅 {{ $activity->event_date->format('d M Y') }}</p>
                            @endif
                            @if($activity->location)
                            <p>📍 {{ $activity->location }}</p>
                            @endif
                            @if($activity->participant_count > 0)
                            <p>👥 {{ $activity->participant_count }} participants</p>
                            @endif
                        </div>

                        <a href="{{ route('activities.show', $activity) }}" class="inline-block text-deme-cyan font-semibold hover:text-deme-dark transition">
                            Découvrir →
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-deme-gray text-lg">Aucune activité trouvée</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($activities->hasPages())
            <div class="flex justify-center">
                {{ $activities->links() }}
            </div>
            @endif
        </div>
    </section>
@endsection
