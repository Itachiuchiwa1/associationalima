@extends('layouts.app')

@section('title', 'Poser une Question Anonyme - DÉMÉ')
@section('description', 'Posez votre question de manière anonyme et sécurisée')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-gradient-to-r from-deme-dark to-deme-cyan overflow-hidden pt-20">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white z-10 w-full">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Poser une Question</h1>
            <p class="text-xl text-blue-100">Votre anonymat est garanti</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('anonymous.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-premium">
                @csrf

                <div class="mb-8">
                    <label class="block text-deme-dark font-semibold mb-3">Votre Question</label>
                    <textarea name="question" rows="6" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition resize-none @error('question') border-red-500 @enderror" placeholder="Posez votre question ici..."></textarea>
                    @error('question')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label class="block text-deme-dark font-semibold mb-3">Catégorie (Optionnel)</label>
                    <select name="category" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition">
                        <option value="">Sélectionner une catégorie</option>
                        <option value="Général">Général</option>
                        <option value="Formation">Formation</option>
                        <option value="Santé">Santé & Bien-être</option>
                        <option value="Communauté">Communauté</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <div class="bg-deme-slate p-6 rounded-lg mb-8 border-l-4 border-deme-cyan">
                    <h4 class="font-bold text-deme-dark mb-2">🔒 Votre Anonymat</h4>
                    <p class="text-deme-gray text-sm">
                        Vos données personnelles ne seront jamais collectées. Cette plateforme garantit un environnement sûr et confidentiel pour poser vos questions.
                    </p>
                </div>

                <button type="submit" class="w-full px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
                    Soumettre ma Question
                </button>

                <p class="text-center text-deme-gray text-sm mt-6">
                    Votre question sera modérée avant publication. <a href="{{ route('anonymous.index') }}" class="text-deme-cyan hover:text-deme-dark transition">Voir les questions</a>
                </p>
            </form>
        </div>
    </section>
@endsection
