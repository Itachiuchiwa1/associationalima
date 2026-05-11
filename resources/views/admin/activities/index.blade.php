@extends('layouts.admin')

@section('heading', 'Activités')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-deme-dark">Gérer les Activités</h2>
        <a href="{{ route('admin.activities.create') }}" class="px-6 py-3 bg-gradient-hero text-white font-bold rounded-lg">➕ Nouvelle</a>
    </div>

    <div class="bg-white rounded-lg shadow-premium overflow-hidden">
        <table class="w-full">
            <thead class="bg-deme-slate">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">Titre</th>
                    <th class="px-6 py-4 text-left font-semibold">Date</th>
                    <th class="px-6 py-4 text-left font-semibold">Lieu</th>
                    <th class="px-6 py-4 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($activities as $activity)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 font-semibold">{{ $activity->title }}</td>
                    <td class="px-6 py-4">{{ $activity->event_date?->format('d/m/Y') ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $activity->location }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.activities.edit', $activity) }}" class="px-3 py-1 bg-deme-cyan text-deme-dark rounded text-sm">✏️</a>
                            <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr?')" class="px-3 py-1 bg-red-500 text-white rounded text-sm">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-12 text-center text-deme-gray">Aucune activité</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
