@extends('layouts.admin')
@section('heading', 'Détail Contact')
@section('content')
<div class="max-w-2xl bg-white p-8 rounded-lg shadow-premium">
    <div class="mb-6">
        <h3 class="font-bold text-deme-dark mb-2">Nom</h3>
        <p class="text-deme-gray">{{ $contact->name }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-bold text-deme-dark mb-2">Email</h3>
        <p class="text-deme-gray">{{ $contact->email }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-bold text-deme-dark mb-2">Téléphone</h3>
        <p class="text-deme-gray">{{ $contact->phone ?? '-' }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-bold text-deme-dark mb-2">Sujet</h3>
        <p class="text-deme-gray">{{ $contact->subject }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-bold text-deme-dark mb-2">Message</h3>
        <p class="text-deme-gray whitespace-pre-wrap">{{ $contact->message }}</p>
    </div>

    <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="mb-6">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold text-deme-dark mb-2">Notes Admin</label>
            <textarea name="admin_notes" rows="4" class="w-full px-4 py-3 border border-slate-200 rounded-lg">{{ $contact->admin_notes }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-deme-dark mb-2">Statut</label>
            <select name="status" class="w-full px-4 py-3 border border-slate-200 rounded-lg">
                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>Nouveau</option>
                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Lu</option>
                <option value="resolved" {{ $contact->status === 'resolved' ? 'selected' : '' }}>Résolu</option>
            </select>
        </div>
        <button type="submit" class="px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg">Mettre à jour</button>
    </form>

    <a href="{{ route('admin.contacts.index') }}" class="text-deme-cyan hover:text-deme-dark transition font-semibold">← Retour</a>
</div>
@endsection
