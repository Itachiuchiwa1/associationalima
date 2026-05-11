@extends('layouts.admin')

@section('heading', 'Articles')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-deme-dark">Gérer les Articles</h2>
        <a href="{{ route('admin.posts.create') }}" class="px-6 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
            ➕ Nouvel Article
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-lg shadow-premium overflow-hidden">
        <table class="w-full">
            <thead class="bg-deme-slate border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Titre</th>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Catégorie</th>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Auteur</th>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Statut</th>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Date</th>
                    <th class="px-6 py-4 text-left font-semibold text-deme-dark">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($posts as $post)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-semibold text-deme-dark">{{ $post->title }}</td>
                    <td class="px-6 py-4 text-deme-gray">{{ $post->category?->name ?? '-' }}</td>
                    <td class="px-6 py-4 text-deme-gray">{{ $post->author->name }}</td>
                    <td class="px-6 py-4">
                        <span class="text-xs px-3 py-1 rounded-full {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-deme-gray text-sm">{{ $post->published_at?->format('d/m/Y') ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="px-3 py-1 bg-deme-cyan text-deme-dark rounded hover:shadow-glow transition text-sm font-semibold">
                                ✏️
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr?')" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm font-semibold">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-deme-gray">
                        Aucun article
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
    <div class="mt-8 flex justify-center">
        {{ $posts->links() }}
    </div>
    @endif
@endsection
