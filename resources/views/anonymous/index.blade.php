@extends('layouts.app')

@section('title', 'Questions Anonymes - DÉMÉ')
@section('description', 'Posez vos questions de manière anonyme et recevez des réponses')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-gradient-to-r from-deme-dark to-deme-cyan overflow-hidden pt-20">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white z-10 w-full">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Questions Anonymes</h1>
            <p class="text-xl text-blue-100">Un espace sécurisé pour poser vos questions sans révéler votre identité</p>
            <a href="{{ route('anonymous.create') }}" class="inline-block mt-8 px-8 py-3 bg-white text-deme-dark font-bold rounded-lg hover:shadow-glow transition-all">
                Poser une question
            </a>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Questions List -->
            <div class="space-y-6">
                @forelse($questions as $question)
                <div class="bg-white p-8 rounded-lg shadow-premium hover:shadow-premium-lg transition-all border-l-4 border-deme-cyan">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-deme-dark mb-2">{{ $question->question }}</h3>
                            @if($question->category)
                            <span class="text-xs font-semibold text-deme-cyan uppercase bg-deme-cyan/10 px-3 py-1 rounded">{{ $question->category }}</span>
                            @endif
                        </div>
                        <span class="text-sm text-deme-gray">{{ $question->created_at->format('d M Y') }}</span>
                    </div>

                    @if($question->answers->count() > 0)
                    <div class="mt-6 pt-6 border-t border-slate-200 space-y-4">
                        <h4 class="font-bold text-deme-dark">Réponse(s):</h4>
                        @foreach($question->answers as $answer)
                        <div class="bg-gradient-subtle p-4 rounded-lg">
                            <p class="text-deme-gray">{{ $answer->answer }}</p>
                            @if($answer->user)
                            <p class="text-xs text-deme-gray mt-2">Par {{ $answer->user->name }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-deme-gray italic mt-4">En attente de réponse...</p>
                    @endif
                </div>
                @empty
                <div class="text-center py-16">
                    <p class="text-deme-gray text-lg">Aucune question pour le moment</p>
                    <a href="{{ route('anonymous.create') }}" class="inline-block mt-6 px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
                        Poser la première question
                    </a>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($questions->hasPages())
            <div class="flex justify-center mt-12">
                {{ $questions->links() }}
            </div>
            @endif
        </div>
    </section>
@endsection
