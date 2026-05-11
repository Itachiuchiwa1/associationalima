@extends('layouts.app')

@section('title', 'Politique de Confidentialité - DÉMÉ')

@section('content')
    <section class="py-20 pt-40">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-deme-dark mb-8">Politique de Confidentialité</h1>
            
            <div class="prose max-w-none text-deme-gray leading-relaxed space-y-6">
                <p>
                    DÉMÉ ("nous", "notre", ou "nos") opère le site https://deme.fr (le "Site"). Cette page vous informe de nos politiques concernant la collecte, l'utilisation et la divulgation de données personnelles lorsque vous utilisez notre Site.
                </p>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Collecte de Données</h2>
                <p>
                    Nous collectons plusieurs types de données à des fins différentes pour vous fournir un meilleur service.
                </p>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Types de Données Collectées</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>Données de Contact: Nom, Email, Numéro de Téléphone</li>
                    <li>Données d'Utilisation: Pages visitées, Temps d'accès</li>
                    <li>Données de Localisation: Avec votre consentement</li>
                </ul>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Utilisation des Données</h2>
                <p>
                    DÉMÉ utilise les données collectées à plusieurs fins:
                </p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Pour vous contacter concernant notre Site</li>
                    <li>Pour améliorer notre service</li>
                    <li>Pour analyser l'utilisation de notre Site</li>
                    <li>Pour vous envoyer des newsletters</li>
                </ul>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Sécurité de Vos Données</h2>
                <p>
                    La sécurité de vos données est importante pour nous mais aucune méthode de transmission sur Internet n'est 100% sécurisée.
                </p>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Modifications de Cette Politique</h2>
                <p>
                    Nous pouvons mettre à jour notre politique de confidentialité de temps à autre. Les modifications seront publiées sur cette page avec une date de mise à jour.
                </p>

                <h2 class="text-2xl font-bold text-deme-dark mt-8">Nous Contacter</h2>
                <p>
                    Pour toute question concernant cette politique de confidentialité, veuillez nous contacter à contact@deme.org.
                </p>
            </div>
        </div>
    </section>
@endsection
