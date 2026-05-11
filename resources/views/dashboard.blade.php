@extends('layouts.app')

@section('title', 'Tableau de bord - DÉMÉ')
@section('description', 'Votre espace personnel DÉMÉ')

@section('content')
<section class="min-h-screen bg-slate-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="rounded-[2rem] bg-white border border-slate-200 p-8 shadow-soft mb-10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-bold text-deme-dark">Bienvenue, {{ auth()->user()->name }} !</h1>
                    <p class="text-slate-600 mt-3">Vous êtes connecté à votre espace DÉMÉ.</p>
                </div>
                <div class="flex items-center gap-4">
                    @if(auth()->user()->avatar)
                        <img class="w-20 h-20 rounded-full object-cover border border-slate-200" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar">
                    @else
                        <div class="w-20 h-20 rounded-full bg-deme-cyan flex items-center justify-center text-3xl font-bold text-white border border-slate-200">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="card-surface p-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-deme-cyan text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Rôle</p>
                        <p class="text-2xl font-semibold text-deme-dark capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
            <div class="card-surface p-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Statut</p>
                        <p class="text-2xl font-semibold text-deme-dark capitalize">{{ auth()->user()->status ?? 'actif' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-surface p-6">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-purple-500 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Membre depuis</p>
                        <p class="text-2xl font-semibold text-deme-dark">{{ auth()->user()->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-surface p-8">
            <h2 class="text-2xl font-bold text-deme-dark mb-6">Actions rapides</h2>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <a href="{{ route('profile.edit') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-deme-cyan text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-deme-dark">Mon profil</p>
                            <p class="text-sm text-slate-500">Gérer mes informations</p>
                        </div>
                    </div>
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-deme-dark text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2H10a2 2 0 01-2-2v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2v-.2a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1-1.51L0 12a2 2 0 010-2.83l.06-.06a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82L1.17 6.21a2 2 0 010-2.83 2 2 0 012.83 0L4.06 3.44a1.65 1.65 0 001.82.33H6.1a1.65 1.65 0 001-1.51V1a2 2 0 012-2h.2a1.65 1.65 0 001.82.33 1.65 1.65 0 001 1.51H13a1.65 1.65 0 001.82-.33l.19-.19a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V6.1a1.65 1.65 0 001.51 1H21a2 2 0 012 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-deme-dark">Administration</p>
                                <p class="text-sm text-slate-500">Gérer le site</p>
                            </div>
                        </div>
                    </a>
                @endif
                <a href="{{ route('activities.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-500 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-deme-dark">Activités</p>
                            <p class="text-sm text-slate-500">Voir nos actions</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('blog.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-blue-500 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-deme-dark">Blog</p>
                            <p class="text-sm text-slate-500">Lire nos articles</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('gallery.index') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-purple-500 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-deme-dark">Galerie</p>
                            <p class="text-sm text-slate-500">Voir nos photos</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('contact.show') }}" class="group block rounded-[1.75rem] border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-amber-500 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-deme-dark">Contact</p>
                            <p class="text-sm text-slate-500">Nous contacter</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
