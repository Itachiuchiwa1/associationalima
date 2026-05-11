<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 20" :class="scrolled ? 'bg-white/95 shadow-sm backdrop-blur-xl' : 'bg-transparent'" class="fixed inset-x-0 top-0 z-50 transition-all duration-500">
    <div class="border-b border-slate-200/50" :class="scrolled ? 'border-opacity-100' : 'border-opacity-0'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="h-12 w-auto rounded-2xl bg-white p-1 shadow-sm" />
                    <div>
                        <p class="text-base font-semibold text-deme-dark">DÉMÉ</p>
                        <p class="text-xs text-slate-500">Association humanitaire</p>
                    </div>
                </a>

                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Accueil</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">À propos</a>
                    <a href="{{ route('activities.index') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Activités</a>
                    <a href="{{ route('blog.index') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Articles</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Galerie</a>
                    <a href="{{ route('contact.show') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Contact</a>
                </div>

                <div class="hidden lg:flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Connexion</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full bg-deme-cyan px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 transition">S'inscrire</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-slate-700 hover:text-deme-dark transition">Mon espace</a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-full border border-deme-cyan px-5 py-2 text-sm font-semibold text-deme-dark bg-white shadow-sm hover:bg-deme-cyan/10 transition">Admin</a>
                        @endif
                    @endguest
                </div>

                <button @click="open = ! open" class="lg:hidden inline-flex items-center justify-center rounded-full border border-slate-300 bg-white p-2 text-slate-700 shadow-sm hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 110-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2zm0 4h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" x-transition class="lg:hidden bg-white border-t border-slate-200 shadow-sm">
            <div class="space-y-1 px-4 py-4">
                <a href="{{ route('home') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Accueil</a>
                <a href="{{ route('about') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">À propos</a>
                <a href="{{ route('activities.index') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Activités</a>
                <a href="{{ route('blog.index') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Articles</a>
                <a href="{{ route('gallery.index') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Galerie</a>
                <a href="{{ route('contact.show') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-deme-dark bg-deme-cyan/10 hover:bg-deme-cyan/20">Connexion</a>
                    <a href="{{ route('register') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-white bg-deme-cyan">S'inscrire</a>
                @else
                    <a href="{{ route('dashboard') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 bg-slate-50">Mon espace</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block rounded-xl px-4 py-3 text-sm font-semibold text-deme-dark bg-deme-cyan/10">Admin</a>
                    @endif
                @endguest
            </div>
        </div>
    </div>
</nav>
