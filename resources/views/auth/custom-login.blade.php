@extends('layouts.app')

@section('title', 'Connexion - DÉMÉ')
@section('description', 'Connectez-vous à votre compte DÉMÉ')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-deme-dark via-blue-900 to-deme-cyan py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo -->
        <div class="text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 group">
                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-deme-dark font-bold text-xl group-hover:shadow-glow transition-all">
                    D
                </div>
                <span class="text-2xl font-bold text-white">DÉMÉ</span>
            </a>
            <h2 class="mt-6 text-3xl font-bold text-white">
                Connexion à votre compte
            </h2>
            <p class="mt-2 text-blue-100">
                Accédez à votre espace personnel
            </p>
        </div>

        <!-- Session Status -->
        @if(session('status'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 shadow-premium">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-white mb-2">
                    Adresse email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-deme-cyan focus:border-transparent transition-all"
                       placeholder="votre@email.com">
                @error('email')
                    <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-6">
                <label for="password" class="block text-sm font-medium text-white mb-2">
                    Mot de passe
                </label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-deme-cyan focus:border-transparent transition-all"
                       placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mt-6 flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-white/30 bg-white/20 text-deme-cyan focus:ring-deme-cyan">
                    <span class="ml-2 text-sm text-blue-100">Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-deme-cyan hover:text-white transition">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <div class="mt-8">
                <button type="submit" class="w-full bg-gradient-hero text-white font-bold py-3 px-4 rounded-lg hover:shadow-glow transition-all duration-300 transform hover:-translate-y-0.5">
                    Se connecter
                </button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-blue-100">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="text-deme-cyan hover:text-white font-semibold transition">
                        S'inscrire
                    </a>
                </p>
            </div>
        </form>
    </div>
</section>
@endsection