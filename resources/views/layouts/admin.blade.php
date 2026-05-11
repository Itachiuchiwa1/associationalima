<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - DÉMÉ Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-white border-r border-slate-200 p-6 sticky top-0 h-screen overflow-y-auto">
            <div class="flex items-center gap-3 mb-10">
                <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="h-12 w-12 rounded-2xl shadow-sm" />
                <div>
                    <p class="text-base font-semibold text-deme-dark">DÉMÉ Admin</p>
                    <p class="text-sm text-slate-500">Gestion du contenu</p>
                </div>
            </div>

            <nav class="space-y-2 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">📊 Dashboard</a>
                <a href="{{ route('admin.posts.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.posts.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">📝 Articles</a>
                <a href="{{ route('admin.activities.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.activities.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">🎯 Activités</a>
                <a href="{{ route('admin.categories.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.categories.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">📂 Catégories</a>
                <a href="{{ route('admin.galleries.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.galleries.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">🖼️ Galeries</a>
                <a href="{{ route('admin.testimonials.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.testimonials.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">⭐ Témoignages</a>
                <a href="{{ route('admin.anonymous-questions.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.anonymous-questions.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">❓ Questions</a>
                <a href="{{ route('admin.contacts.index') }}" class="block rounded-3xl px-4 py-3 {{ request()->routeIs('admin.contacts.*') ? 'bg-deme-cyan text-deme-dark font-semibold' : 'text-slate-700 hover:bg-slate-100' }}">📧 Contacts</a>
            </nav>

            <div class="mt-10 pt-6 border-t border-slate-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full rounded-full bg-red-600 px-4 py-3 text-sm font-semibold text-white hover:bg-red-700 transition">Déconnexion</button>
                </form>
            </div>
        </aside>

        <div class="flex-1">
            <header class="bg-white border-b border-slate-200 px-8 py-5 sticky top-0 z-20">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-deme-dark">@yield('heading', 'Dashboard')</h1>
                        <p class="text-sm text-slate-500">Gestion claire et stratégique du contenu associatif.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('home') }}" target="_blank" class="text-sm font-semibold text-deme-dark hover:text-deme-cyan transition">Voir le site public</a>
                    </div>
                </div>
            </header>

            <main class="p-8">
                @if(session('success'))
                    <div class="mb-6 rounded-3xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
