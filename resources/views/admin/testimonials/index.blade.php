@extends('layouts.admin')
@section('heading', 'Témoignages')
@section('content')
<div class="bg-white rounded-lg shadow-premium overflow-hidden">
    <table class="w-full">
        <thead class="bg-deme-slate">
            <tr>
                <th class="px-6 py-4 text-left font-semibold">Auteur</th>
                <th class="px-6 py-4 text-left font-semibold">Note</th>
                <th class="px-6 py-4 text-left font-semibold">Statut</th>
                <th class="px-6 py-4 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($testimonials as $testimonial)
            <tr class="hover:bg-slate-50">
                <td class="px-6 py-4"><strong>{{ $testimonial->author_name }}</strong><br><small class="text-deme-gray">{{ $testimonial->author_role }}</small></td>
                <td class="px-6 py-4">{{ str_repeat('⭐', $testimonial->rating) }}</td>
                <td class="px-6 py-4"><span class="text-xs px-3 py-1 rounded-full {{ $testimonial->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ ucfirst($testimonial->status) }}</span></td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-3 py-1 bg-deme-cyan text-deme-dark rounded text-sm">✏️</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Sûr?')" class="px-3 py-1 bg-red-500 text-white rounded text-sm">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-12 text-center text-deme-gray">Aucun témoignage</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
