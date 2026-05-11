@extends('layouts.admin')

@section('heading', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="grid md:grid-cols-5 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="text-4xl font-bold text-deme-cyan mb-2">{{ $stats['posts'] }}</div>
            <p class="text-deme-gray font-semibold">Articles</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="text-4xl font-bold text-deme-cyan mb-2">{{ $stats['activities'] }}</div>
            <p class="text-deme-gray font-semibold">Activités</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="text-4xl font-bold text-orange-500 mb-2">{{ $stats['contacts'] }}</div>
            <p class="text-deme-gray font-semibold">Contacts neufs</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="text-4xl font-bold text-red-500 mb-2">{{ $stats['questions'] }}</div>
            <p class="text-deme-gray font-semibold">Questions en attente</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-premium">
            <div class="text-4xl font-bold text-purple-500 mb-2">{{ $stats['testimonials'] }}</div>
            <p class="text-deme-gray font-semibold">Témoignages</p>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Recent Contacts -->
        <div class="bg-white rounded-lg shadow-premium">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-bold text-deme-dark">Derniers Contacts</h2>
            </div>
            <div class="divide-y">
                @forelse($recentContacts as $contact)
                <div class="p-6 hover:bg-slate-50 transition">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-deme-dark">{{ $contact->name }}</h3>
                        <span class="text-xs px-3 py-1 rounded-full {{ $contact->status === 'new' ? 'bg-red-100 text-red-700' : ($contact->status === 'read' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                            {{ ucfirst($contact->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-deme-gray mb-2">{{ $contact->email }}</p>
                    <p class="text-sm text-deme-gray font-semibold mb-2">{{ $contact->subject }}</p>
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-deme-cyan hover:text-deme-dark transition text-sm">
                        Voir le message →
                    </a>
                </div>
                @empty
                <div class="p-6 text-center text-deme-gray">
                    Aucun contact
                </div>
                @endforelse
            </div>
            <div class="p-6 border-t border-slate-200 text-center">
                <a href="{{ route('admin.contacts.index') }}" class="text-deme-cyan hover:text-deme-dark transition font-semibold">
                    Voir tous les contacts →
                </a>
            </div>
        </div>

        <!-- Recent Questions -->
        <div class="bg-white rounded-lg shadow-premium">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-bold text-deme-dark">Questions en attente</h2>
            </div>
            <div class="divide-y">
                @forelse($recentQuestions as $question)
                <div class="p-6 hover:bg-slate-50 transition">
                    <p class="text-deme-dark font-semibold mb-2 line-clamp-2">{{ $question->question }}</p>
                    @if($question->category)
                    <span class="text-xs text-deme-cyan font-semibold uppercase">{{ $question->category }}</span>
                    @endif
                    <div class="mt-3 flex gap-2">
                        <a href="{{ route('admin.anonymous-questions.edit', $question) }}" class="text-deme-cyan hover:text-deme-dark transition text-sm">
                            Répondre
                        </a>
                        <span class="text-deme-gray">•</span>
                        <form action="{{ route('admin.anonymous-questions.destroy', $question) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr?')" class="text-red-600 hover:text-red-700 transition text-sm">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="p-6 text-center text-deme-gray">
                    Aucune question en attente
                </div>
                @endforelse
            </div>
            <div class="p-6 border-t border-slate-200 text-center">
                <a href="{{ route('admin.anonymous-questions.index') }}" class="text-deme-cyan hover:text-deme-dark transition font-semibold">
                    Voir toutes les questions →
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-white rounded-lg shadow-premium p-8">
        <h2 class="text-2xl font-bold text-deme-dark mb-6">Actions Rapides</h2>
        <div class="grid md:grid-cols-4 gap-4">
            <a href="{{ route('admin.posts.create') }}" class="p-4 bg-deme-slate hover:bg-slate-200 rounded-lg transition text-center font-semibold text-deme-dark">
                ➕ Nouvel Article
            </a>
            <a href="{{ route('admin.activities.create') }}" class="p-4 bg-deme-slate hover:bg-slate-200 rounded-lg transition text-center font-semibold text-deme-dark">
                ➕ Nouvelle Activité
            </a>
            <a href="{{ route('admin.categories.create') }}" class="p-4 bg-deme-slate hover:bg-slate-200 rounded-lg transition text-center font-semibold text-deme-dark">
                ➕ Nouvelle Catégorie
            </a>
            <a href="{{ route('admin.galleries.create') }}" class="p-4 bg-deme-slate hover:bg-slate-200 rounded-lg transition text-center font-semibold text-deme-dark">
                ➕ Nouvelle Galerie
            </a>
        </div>
    </div>
@endsection
