@extends('layouts.app')

@section('title', $activity->title . ' - DÉMÉ')
@section('description', $activity->description)
@if($activity->featured_image)
    @section('og_image', asset('storage/' . $activity->featured_image))
@endif

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden pt-20">
        @if($activity->featured_image)
            <img src="{{ asset('storage/' . $activity->featured_image) }}" alt="{{ $activity->title }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover">
        @else
            <div class="absolute inset-0 bg-gradient-hero"></div>
        @endif
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white z-10 w-full">
            <h1 class="text-5xl font-bold mb-4">{{ $activity->title }}</h1>
            @if($activity->category)
            <span class="text-deme-cyan font-semibold">{{ $activity->category->name }}</span>
            @endif
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Activity Details -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="md:col-span-2">
                    <div class="prose max-w-none">
                        <h2 class="text-2xl font-bold text-deme-dark mb-4">À Propos</h2>
                        <p class="text-deme-gray leading-relaxed whitespace-pre-wrap">{{ $activity->content ?? $activity->description }}</p>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-deme-slate p-6 rounded-lg space-y-6">
                        @if($activity->event_date)
                        <div class="border-b border-slate-200 pb-4">
                            <h4 class="text-sm font-semibold text-deme-gray uppercase mb-2">Date de l'événement</h4>
                            <p class="text-2xl font-bold text-deme-dark">{{ $activity->event_date->format('d M Y') }}</p>
                            <p class="text-deme-gray">{{ $activity->event_date->format('H:i') }}</p>
                        </div>
                        @endif

                        @if($activity->location)
                        <div class="border-b border-slate-200 pb-4">
                            <h4 class="text-sm font-semibold text-deme-gray uppercase mb-2">Lieu</h4>
                            <p class="text-lg text-deme-dark">{{ $activity->location }}</p>
                        </div>
                        @endif

                        @if($activity->participant_count > 0)
                        <div class="border-b border-slate-200 pb-4">
                            <h4 class="text-sm font-semibold text-deme-gray uppercase mb-2">Participants</h4>
                            <p class="text-2xl font-bold text-deme-cyan">{{ $activity->participant_count }}</p>
                        </div>
                        @endif

                        <a href="{{ route('contact.show') }}" class="w-full px-6 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all text-center">
                            Participer
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Activities -->
            <section class="mt-20 pt-12 border-t border-slate-200">
                <h2 class="text-3xl font-bold text-deme-dark mb-8">Autres Activités</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="bg-white rounded-lg overflow-hidden shadow-premium hover:shadow-premium-lg hover:-translate-y-2 transition-all group">
                        <div class="h-40 bg-gradient-subtle"></div>
                        <div class="p-4">
                            <h3 class="font-bold text-deme-dark group-hover:text-deme-cyan transition">Activité Connexe {{ $i }}</h3>
                            <a href="#" class="text-deme-cyan font-semibold text-sm hover:text-deme-dark transition">
                                Découvrir →
                            </a>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>
        </div>
    </section>
@endsection
