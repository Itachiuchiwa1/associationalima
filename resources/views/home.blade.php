@extends('layouts.app')

@section('title', 'DÉMÉ - Association Humanitaire Moderne')
@section('description', 'Plateforme complète pour découvrir nos actions sociales, formations, campagnes communautaires et activités humanitaires.')

@section('content')
    <section class="relative overflow-hidden pt-20">
        <div class="absolute -top-20 -left-20 h-72 w-72 rounded-full bg-deme-cyan/20 blur-3xl"></div>
        <div class="absolute -bottom-24 right-0 h-80 w-80 rounded-full bg-deme-dark/5 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <p class="inline-flex items-center rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Association humanitaire moderne</p>
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight tracking-tight text-deme-dark">Ensemble, nous agissons pour les communautés vulnérables.</h1>
                    <p class="max-w-2xl text-lg leading-8 text-slate-600">DÉMÉ accompagne les parcours de vie par des actions sociales, des formations opérationnelles et des projets solidaires à impact réel.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('activities.index') }}" class="btn-primary">Découvrir nos actions</a>
                        <a href="{{ route('contact.show') }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 px-6 py-3 text-sm font-semibold text-deme-dark hover:bg-slate-100 transition">Nous rejoindre</a>
                    </div>
                </div>
                <div class="rounded-[2rem] bg-white shadow-premium p-8">
                    <div class="space-y-6">
                        <div class="rounded-[2rem] overflow-hidden bg-slate-100 h-96">
                            <img src="{{ asset('logoassociation.jpeg') }}" alt="DÉMÉ association" class="h-full w-full object-cover" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-3xl bg-deme-cyan/10 p-6">
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-deme-dark">Volontaires</p>
                                <p class="text-3xl font-bold text-deme-dark mt-3">500+</p>
                            </div>
                            <div class="rounded-3xl bg-deme-dark/5 p-6">
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Années</p>
                                <p class="text-3xl font-bold text-deme-dark mt-3">12</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-deme-slate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-deme-dark mb-10">Notre Impact</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="card-surface p-8 text-center">
                    <p class="text-5xl font-bold text-deme-cyan mb-3">2.5K+</p>
                    <p class="text-slate-600 font-semibold">Bénéficiaires</p>
                </div>
                <div class="card-surface p-8 text-center">
                    <p class="text-5xl font-bold text-deme-cyan mb-3">150+</p>
                    <p class="text-slate-600 font-semibold">Activités</p>
                </div>
                <div class="card-surface p-8 text-center">
                    <p class="text-5xl font-bold text-deme-cyan mb-3">500+</p>
                    <p class="text-slate-600 font-semibold">Volontaires</p>
                </div>
                <div class="card-surface p-8 text-center">
                    <p class="text-5xl font-bold text-deme-cyan mb-3">12</p>
                    <p class="text-slate-600 font-semibold">Années</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-deme-dark mb-6">Qui sommes-nous ?</h2>
                    <p class="text-lg leading-8 text-slate-600 mb-4">DÉMÉ est une association humanitaire qui agit avec transparence et engagement pour soutenir ceux qui en ont le plus besoin. Nous mettons en place des projets sociaux, des formations et des campagnes solidaires efficientes.</p>
                    <p class="text-lg leading-8 text-slate-600 mb-8">Nous croyons au pouvoir de l'entraide et au changement durable grâce aux actions locales et collectives.</p>
                    <a href="{{ route('about') }}" class="btn-primary">En savoir plus</a>
                </div>
                <div class="rounded-[2rem] bg-gradient-to-br from-deme-dark/5 to-deme-cyan/10 p-10">
                    <div class="h-96 w-full rounded-[2rem] border border-slate-200 bg-white shadow-soft"></div>
                </div>
            </div>
        </div>
    </section>

    @if($recentActivities->count() > 0)
    <section class="py-20 bg-deme-slate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-10">
                <h2 class="text-4xl font-bold text-deme-dark">Nos prochaines activités</h2>
                <a href="{{ route('activities.index') }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">Voir tout →</a>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($recentActivities as $activity)
                <div class="card-surface overflow-hidden hover:-translate-y-2 transition-all">
                    <div class="h-56 overflow-hidden">
                        @if($activity->featured_image)
                            <img src="{{ asset('storage/' . $activity->featured_image) }}" alt="{{ $activity->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        @else
                            <div class="h-full bg-gradient-to-br from-deme-dark/5 to-deme-cyan/15"></div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-deme-dark mb-3">{{ $activity->title }}</h3>
                        <p class="text-slate-600 mb-4 line-clamp-2">{{ $activity->description }}</p>
                        @if($activity->event_date)
                        <p class="text-sm font-semibold text-deme-cyan mb-4">📅 {{ $activity->event_date->format('d M Y') }}</p>
                        @endif
                        <a href="{{ route('activities.show', $activity) }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">Découvrir →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($testimonials->count() > 0)
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-deme-dark">Ce qu'ils en pensent</h2>
                <p class="text-slate-600 mt-4">Témoignages de personnes et partenaires engagés.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="card-surface p-8 border-l-4 border-deme-cyan">
                    <div class="flex items-center gap-4 mb-6">
                        @if($testimonial->author_image)
                            <img src="{{ asset('storage/' . $testimonial->author_image) }}" alt="{{ $testimonial->author_name }}" loading="lazy" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 rounded-full bg-deme-cyan flex items-center justify-center text-white font-bold">{{ substr($testimonial->author_name, 0, 1) }}</div>
                        @endif
                        <div>
                            <p class="font-semibold text-deme-dark">{{ $testimonial->author_name }}</p>
                            <p class="text-sm text-slate-500">{{ $testimonial->author_role }}</p>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-4">{{ $testimonial->content }}</p>
                    <div class="flex gap-1">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <span class="text-deme-cyan">★</span>
                        @endfor
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($recentPosts->count() > 0)
    <section class="py-20 bg-deme-slate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-10">
                <h2 class="text-4xl font-bold text-deme-dark">Derniers articles</h2>
                <a href="{{ route('blog.index') }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">Voir tout →</a>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($recentPosts as $post)
                <div class="card-surface overflow-hidden hover:-translate-y-2 transition-all">
                    @if($post->featured_image)
                    <div class="h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                    @else
                    <div class="h-56 bg-gradient-to-br from-deme-dark/5 to-deme-cyan/15"></div>
                    @endif
                    <div class="p-6">
                        @if($post->category)
                            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-deme-cyan">{{ $post->category->name }}</span>
                        @endif
                        <h3 class="text-2xl font-semibold text-deme-dark mt-3 mb-4">{{ $post->title }}</h3>
                        <p class="text-slate-600 mb-5 line-clamp-2">{{ $post->excerpt ?? substr($post->content, 0, 100) }}</p>
                        <div class="flex items-center justify-between text-sm text-slate-500">
                            <span>{{ optional($post->published_at)->format('d M Y') }}</span>
                            <a href="{{ route('blog.show', $post) }}" class="text-deme-cyan font-semibold hover:text-deme-dark transition">Lire →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] bg-gradient-to-r from-deme-dark to-deme-cyan p-12 text-center text-white shadow-premium">
                <h2 class="text-4xl font-bold mb-6">Prêt à faire la différence ?</h2>
                <p class="text-lg leading-8 mb-8">Rejoignez-nous dans notre mission pour créer un impact positif dans les communautés.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('activities.index') }}" class="rounded-full bg-white px-8 py-3 text-sm font-semibold text-deme-dark shadow-soft hover:-translate-y-0.5 transition">Participer à une activité</a>
                    <a href="{{ route('contact.show') }}" class="rounded-full border border-white px-8 py-3 text-sm font-semibold text-white hover:bg-white/10 transition">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>
@endsection
