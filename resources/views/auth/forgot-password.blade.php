@extends('layouts.app')

@section('title', 'Mot de passe oublié - DÉMÉ')
@section('description', 'Réinitialisez votre mot de passe DÉMÉ')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-lg rounded-[2rem] bg-white border border-slate-200 p-10 shadow-soft">
        <div class="text-center mb-10">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="mx-auto h-16 w-auto rounded-3xl shadow-sm bg-white p-2" />
            </a>
            <h2 class="mt-6 text-3xl font-bold text-deme-dark">Mot de passe oublié</h2>
            <p class="text-slate-500 mt-3">Indiquez votre adresse email pour recevoir un lien de réinitialisation.</p>
        </div>

        @if(session('status'))
            <div class="mb-6 rounded-3xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                <button type="submit" class="btn-primary w-full">Envoyer le lien de réinitialisation</button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500">Vous vous souvenez de votre mot de passe ?
            <a href="{{ route('login') }}" class="font-semibold text-deme-cyan hover:text-deme-dark">Se connecter</a>
        </p>
    </div>
</section>
@endsection
