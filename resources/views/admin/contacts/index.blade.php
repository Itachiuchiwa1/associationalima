@extends('layouts.admin')
@section('heading', 'Contacts')
@section('content')
<div class="bg-white rounded-lg shadow-premium overflow-hidden">
    <table class="w-full">
        <thead class="bg-deme-slate">
            <tr>
                <th class="px-6 py-4 text-left font-semibold">Nom</th>
                <th class="px-6 py-4 text-left font-semibold">Email</th>
                <th class="px-6 py-4 text-left font-semibold">Sujet</th>
                <th class="px-6 py-4 text-left font-semibold">Statut</th>
                <th class="px-6 py-4 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($contacts as $contact)
            <tr class="hover:bg-slate-50">
                <td class="px-6 py-4 font-semibold">{{ $contact->name }}</td>
                <td class="px-6 py-4 text-deme-gray">{{ $contact->email }}</td>
                <td class="px-6 py-4">{{ substr($contact->subject, 0, 30) }}...</td>
                <td class="px-6 py-4"><span class="text-xs px-3 py-1 rounded-full {{ $contact->status === 'new' ? 'bg-red-100 text-red-700' : ($contact->status === 'read' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">{{ ucfirst($contact->status) }}</span></td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="px-3 py-1 bg-deme-cyan text-deme-dark rounded text-sm">👁️</a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Sûr?')" class="px-3 py-1 bg-red-500 text-white rounded text-sm">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-12 text-center text-deme-gray">Aucun contact</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
