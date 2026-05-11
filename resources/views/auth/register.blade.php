@extends('layouts.app')

@section('title', 'Inscription - DÉMÉ')
@section('description', 'Créez votre compte DÉMÉ')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-lg rounded-[2rem] bg-white border border-slate-200 p-10 shadow-soft">
        <div class="text-center mb-10">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="mx-auto h-16 w-auto rounded-3xl shadow-sm bg-white p-2" />
            </a>
            <h2 class="mt-6 text-3xl font-bold text-deme-dark">Créer votre compte</h2>
            <p class="text-slate-500 mt-3">Rejoignez notre communauté et participez à des actions à impact.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nom complet</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="Votre nom complet">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="votre@email.com">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Téléphone (optionnel)</label>
                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="+33 6 12 34 56 78">
                @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="••••••••">
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn-primary w-full">S'inscrire</button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500">Déjà un compte ?
            <a href="{{ route('login') }}" class="font-semibold text-deme-cyan hover:text-deme-dark">Se connecter</a>
        </p>
    </div>
</section>
@endsection
