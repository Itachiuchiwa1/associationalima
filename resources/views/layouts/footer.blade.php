<footer class="bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('logoassociation.jpeg') }}" alt="Logo DÉMÉ" class="h-12 w-12 rounded-2xl shadow-sm" />
                    <div>
                        <p class="text-lg font-semibold text-deme-dark">DÉMÉ</p>
                        <p class="text-sm text-slate-500">Association humanitaire</p>
                    </div>
                </div>
                <p class="text-sm text-slate-500 max-w-md">
                    Une plateforme associative moderne pour valoriser l'engagement, les actions sociales et la solidarité sur le terrain.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-[0.2em] mb-4">Liens utiles</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li><a href="{{ route('home') }}" class="hover:text-deme-dark transition">Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-deme-dark transition">À propos</a></li>
                        <li><a href="{{ route('activities.index') }}" class="hover:text-deme-dark transition">Activités</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-deme-dark transition">Articles</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-[0.2em] mb-4">Contact</h3>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>Téléphone : +33 1 23 45 67 89</li>
                        <li>Email : contact@deme.org</li>
                        <li>Paris, France</li>
                    </ul>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-[0.2em] mb-4">Newsletter</h3>
                <p class="text-sm text-slate-500 mb-4">Recevez les dernières actions et opportunités de bénévolat.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Votre email" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-700 focus:border-deme-cyan focus:ring-deme-cyan/30 outline-none" />
                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-deme-cyan px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-500 transition">M'abonner</button>
                </form>
            </div>
        </div>

        <div class="mt-10 border-t border-slate-200 pt-6 text-sm text-slate-500 flex flex-col sm:flex-row sm:justify-between gap-4">
            <p>© {{ date('Y') }} DÉMÉ. Tous droits réservés.</p>
            <p>Conçu pour une association moderne, simple et claire.</p>
        </div>
    </div>
</footer>
