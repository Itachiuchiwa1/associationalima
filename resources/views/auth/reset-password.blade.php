@extends('layouts.app')

@section('title', 'Réinitialiser le mot de passe - DÉMÉ')
@section('description', 'Définissez un nouveau mot de passe pour votre compte DÉMÉ')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-lg rounded-[2rem] bg-white border border-slate-200 p-10 shadow-soft">
        <div class="text-center mb-10">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="mx-auto h-16 w-auto rounded-3xl shadow-sm bg-white p-2" />
            </a>
            <h2 class="mt-6 text-3xl font-bold text-deme-dark">Réinitialiser votre mot de passe</h2>
            <p class="text-slate-500 mt-3">Choisissez un nouveau mot de passe sécurisé pour votre compte.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="votre@email.com">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Nouveau mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirmer le nouveau mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 outline-none transition"
                       placeholder="••••••••">
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn-primary w-full">Réinitialiser le mot de passe</button>
            </div>
        </form>
    </div>
</section>
@endsection
