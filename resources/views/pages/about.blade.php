@extends('layouts.app')

@section('title', 'À Propos - DÉMÉ')
@section('description', 'Découvrez l\'histoire, la mission et les valeurs de DÉMÉ')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-slate-50 overflow-hidden pt-20">
        <div class="absolute top-0 right-0 h-72 w-72 rounded-full bg-deme-cyan/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-deme-dark/5 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-900 z-10">
            <p class="mb-4 inline-flex rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Notre histoire</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">À propos de DÉMÉ</h1>
            <p class="text-xl text-slate-600">Notre histoire, nos valeurs, notre engagement.</p>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-deme-dark mb-12">Notre Histoire</h2>
            <p class="text-lg text-deme-gray leading-relaxed mb-6">
                DÉMÉ a été fondée avec une conviction simple mais puissante : que chacun a le potentiel de contribuer positivement à sa communauté. Pendant plus d'une décennie, nous avons développé une plateforme holistique d'action sociale.
            </p>
            <p class="text-lg text-deme-gray leading-relaxed">
                Aujourd'hui, DÉMÉ est devenue une force motrice dans l'humanitaire, touchant la vie de milliers de personnes à travers des programmes innovants et des initiatives communautaires.
            </p>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="py-20 bg-deme-slate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="bg-white p-8 rounded-lg shadow-premium hover:shadow-premium-lg transition-all">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-2xl font-bold text-deme-dark mb-4">Notre Mission</h3>
                    <p class="text-deme-gray">
                        Créer un impact positif et durable en offrant des opportunités d'éducation, de développement personnel et d'engagement communautaire à tous.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white p-8 rounded-lg shadow-premium hover:shadow-premium-lg transition-all">
                    <div class="text-4xl mb-4">🌟</div>
                    <h3 class="text-2xl font-bold text-deme-dark mb-4">Notre Vision</h3>
                    <p class="text-deme-gray">
                        Un monde où chaque personne a accès aux outils, connaissances et soutien nécessaires pour atteindre son plein potentiel.
                    </p>
                </div>

                <!-- Values -->
                <div class="bg-white p-8 rounded-lg shadow-premium hover:shadow-premium-lg transition-all">
                    <div class="text-4xl mb-4">❤️</div>
                    <h3 class="text-2xl font-bold text-deme-dark mb-4">Nos Valeurs</h3>
                    <p class="text-deme-gray">
                        Intégrité, compassion, excellence, transparence et solidarité. Ces principes guident chacune de nos actions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-deme-dark mb-16">Notre Équipe</h2>
            <div class="grid md:grid-cols-4 gap-8">
                @for($i = 1; $i <= 4; $i++)
                <div class="text-center group">
                    <div class="w-full h-64 bg-gradient-subtle rounded-lg mb-4 group-hover:shadow-glow transition-all"></div>
                    <h3 class="text-xl font-bold text-deme-dark">Membre {{ $i }}</h3>
                    <p class="text-deme-gray">Position</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Impact Stats -->
    <section class="py-20 bg-deme-slate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-deme-dark mb-12">Notre Impact Global</h2>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold text-deme-cyan mb-2">2.5K+</div>
                    <p class="text-deme-gray font-semibold">Vies Touchées</p>
                </div>
                <div>
                    <div class="text-5xl font-bold text-deme-cyan mb-2">150+</div>
                    <p class="text-deme-gray font-semibold">Projets</p>
                </div>
                <div>
                    <div class="text-5xl font-bold text-deme-cyan mb-2">500+</div>
                    <p class="text-deme-gray font-semibold">Volontaires</p>
                </div>
                <div>
                    <div class="text-5xl font-bold text-deme-cyan mb-2">12+</div>
                    <p class="text-deme-gray font-semibold">Années</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-deme-dark mb-12">Nos Partenaires</h2>
            <div class="grid md:grid-cols-5 gap-8 items-center justify-center">
                @for($i = 1; $i <= 5; $i++)
                <div class="h-24 bg-gradient-subtle rounded-lg flex items-center justify-center group hover:shadow-premium transition-all">
                    <span class="text-deme-gray/50 font-semibold group-hover:text-deme-dark transition">Partenaire {{ $i }}</span>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-gradient-hero text-white rounded-2xl mx-4 sm:mx-6 lg:mx-8 mb-20">
        <div class="max-w-4xl mx-auto px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Rejoignez Notre Mission</h2>
            <p class="text-blue-100 mb-8">Ensemble, créons un impact durable</p>
            <a href="{{ route('contact.show') }}" class="inline-block px-8 py-3 bg-white text-deme-dark font-bold rounded-lg hover:shadow-glow transition-all">
                Nous contacter
            </a>
        </div>
    </section>
@endsection
