@extends('layouts.app')

@section('title', 'Connexion - DÉMÉ')
@section('description', 'Connectez-vous à votre compte DÉMÉ')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-lg rounded-[2rem] bg-white border border-slate-200 p-10 shadow-soft">
        <div class="text-center mb-10">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="mx-auto h-16 w-auto rounded-3xl shadow-sm bg-white p-2" />
            </a>
            <h2 class="mt-6 text-3xl font-bold text-deme-dark">Connexion à votre compte</h2>
            <p class="text-slate-500 mt-3">Accédez à votre espace personnel et suivez les actions.</p>
        </div>

        @if(session('status'))
            <div class="mb-6 rounded-3xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="votre@email.com">
                @error('email')
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

            <div class="flex items-center justify-between text-sm text-slate-600">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-deme-cyan focus:ring-deme-cyan">
                    Se souvenir de moi
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="font-semibold text-deme-cyan hover:text-deme-dark transition">Mot de passe oublié ?</a>
                @endif
            </div>

            <div>
                <button type="submit" class="btn-primary w-full">Se connecter</button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500">Pas encore de compte ?
            <a href="{{ route('register') }}" class="font-semibold text-deme-cyan hover:text-deme-dark">S'inscrire</a>
        </p>
    </div>
</section>
@endsection
