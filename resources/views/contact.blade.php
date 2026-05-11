@extends('layouts.app')

@section('title', 'Contactez-nous - DÉMÉ')
@section('description', 'Entrez en contact avec DÉMÉ pour toute question ou partenariat')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-96 flex items-center justify-center bg-slate-50 overflow-hidden pt-20">
        <div class="absolute top-0 right-0 h-72 w-72 rounded-full bg-deme-cyan/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-80 w-80 rounded-full bg-deme-dark/5 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-900 z-10">
            <p class="mb-4 inline-flex rounded-full bg-deme-cyan/10 px-4 py-2 text-sm font-semibold text-deme-dark">Contact</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Nous contacter</h1>
            <p class="text-xl text-slate-600">Nous sommes toujours prêts à discuter de nouvelles opportunités.</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-20">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <!-- Email -->
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gradient-hero text-white rounded-lg flex items-center justify-center flex-shrink-0">
                            ✉️
                        </div>
                        <div>
                            <h3 class="font-bold text-deme-dark mb-1">Email</h3>
                            <a href="mailto:contact@deme.org" class="text-deme-cyan hover:text-deme-dark transition">contact@deme.org</a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gradient-hero text-white rounded-lg flex items-center justify-center flex-shrink-0">
                            ☎️
                        </div>
                        <div>
                            <h3 class="font-bold text-deme-dark mb-1">Téléphone</h3>
                            <a href="tel:+1234567890" class="text-deme-cyan hover:text-deme-dark transition">+1 (234) 567-890</a>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gradient-hero text-white rounded-lg flex items-center justify-center flex-shrink-0">
                            📍
                        </div>
                        <div>
                            <h3 class="font-bold text-deme-dark mb-1">Adresse</h3>
                            <p class="text-deme-gray">123 Rue de l'Humanité<br>75000 Paris, France</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-gradient-hero text-white rounded-lg flex items-center justify-center flex-shrink-0">
                            🕒
                        </div>
                        <div>
                            <h3 class="font-bold text-deme-dark mb-1">Horaires</h3>
                            <p class="text-deme-gray">Lun-Ven: 9h-18h<br>Sam: 10h-14h</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="md:col-span-2">
                    <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-premium">
                        @csrf

                        <div class="mb-6">
                            <label class="block text-deme-dark font-semibold mb-2">Nom Complet</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition @error('name') border-red-500 @enderror">
                            @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-deme-dark font-semibold mb-2">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition @error('email') border-red-500 @enderror">
                            @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-deme-dark font-semibold mb-2">Téléphone (Optionnel)</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition">
                        </div>

                        <div class="mb-6">
                            <label class="block text-deme-dark font-semibold mb-2">Sujet</label>
                            <input type="text" name="subject" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition @error('subject') border-red-500 @enderror">
                            @error('subject')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-deme-dark font-semibold mb-2">Message</label>
                            <textarea name="message" rows="6" required class="w-full px-4 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-deme-cyan focus:ring-2 focus:ring-deme-cyan/20 transition @error('message') border-red-500 @enderror"></textarea>
                            @error('message')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="w-full px-8 py-3 bg-gradient-hero text-white font-bold rounded-lg hover:shadow-glow transition-all">
                            Envoyer le Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="h-96 bg-gradient-subtle relative">
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center">
                <div class="text-6xl mb-4">🗺️</div>
                <p class="text-deme-gray font-semibold">Google Maps à intégrer ici</p>
            </div>
        </div>
    </section>
@endsection
