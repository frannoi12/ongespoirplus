<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($liquid) ? __('Modifier Paiement en Liquide') : __('Ajouter Paiement en Liquide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($liquid) ? route('liquides.update', $liquid->id) : route('liquides.store') }}"
                        method="post" id="liquid-form">
                        @csrf
                        @if (isset($liquid))
                            @method('PUT')
                        @endif
                        {{-- {{dd($liquid)}} --}}

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Détails du Paiement
                            </legend>

                            <!-- Nombre de Mois -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="nbre_mois">{{ __('Nombre de Mois') }}</label>
                                <input id="nbre_mois"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    type="number" name="nbre_mois"
                                    value="{{ old('nbre_mois', $liquid->nbre_mois ?? '') }}" required min="0"
                                    oninput="calculateAmount()" />
                            </div>

                            <!-- Montant -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="montant">{{ __('Montant') }}</label>
                                <input id="montant"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    type="number" name="montant" value="{{ old('montant', $liquid->montant ?? '') }}"
                                    required />
                            </div>

                            <!-- Montant en Lettres -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="montant_lettre">{{ __('Montant en Lettres') }}</label>
                                <textarea id="montant_lettre"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    name="montant_lettre" required>{{ old('montant_lettre', $liquid->montant_lettre ?? '') }}</textarea>
                            </div>

                            <!-- Objet -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="objet">{{ __('Objet') }}</label>
                                <textarea id="objet"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    name="objet" required>{{ old('objet', $liquid->objet ?? '') }}</textarea>
                            </div>

                            <!-- Secteur -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="secteur_id">{{ __('Secteur') }}</label>
                                <p
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    {{ isset($liquid) ? $liquid->paiement->menage->secteur->nomSecteur : $paiement->menage->secteur->nomSecteur }}
                                </p>
                            </div>

                            <!-- Tariff -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="tariff_id">{{ __('Tariff') }}</label>
                                <p
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    {{ isset($liquid) ? $liquid->paiement->menage->tariff->montant : $paiement->menage->tariff->montant }}
                                </p>
                            </div>

                            <!-- Paiement ID caché -->
                            <input type="hidden" name="paiement_id"
                                value="{{ isset($liquid) ? $liquid->paiement_id : $paiement->id }}">
                        </fieldset>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ isset($liquid) ? __('Modifier le Paiement en Liquide') : __('Ajouter le Paiement en Liquide') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateAmount() {
            let nbreMois = document.getElementById('nbre_mois').value;
            let tarifMontant = {{ isset($liquid) ? $liquid->paiement->menage->tariff->montant : $paiement->menage->tariff->montant }};
            let montant = nbreMois * tarifMontant;

            document.getElementById('montant').value = montant;

            // Convertir le montant en lettres si valide
            if (!isNaN(montant) && montant > 0) {
                document.getElementById('montant_lettre').value = convertToWords(montant) + " francs CFA";
            } else {
                document.getElementById('montant_lettre').value = "";
            }
        }

        // Fonction simplifiée pour convertir les nombres en mots (limité à 999 999 999)
        function convertToWords(number) {
            if (number < 0) {
                return "Le nombre ne peut pas être négatif";
            }
            const belowTwenty = ["", "un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix",
                "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept", "dix-huit", "dix-neuf"
            ];
            const tens = ["", "", "vingt", "trente", "quarante", "cinquante", "soixante", "soixante-dix", "quatre-vingt",
                "quatre-vingt-dix"
            ];

            if (number < 20) return belowTwenty[number];
            if (number < 100) return tens[Math.floor(number / 10)] + (number % 10 !== 0 ? "-" + belowTwenty[number % 10] :
                "");
            if (number < 1000) return belowTwenty[Math.floor(number / 100)] + " cent" + (number % 100 !== 0 ? " " +
                convertToWords(number % 100) : "");
            if (number < 1000000) {
                if (Math.floor(number / 1000) === 1) {
                    return "mille" + (number % 1000 !== 0 ? " " + convertToWords(number % 1000) : "");
                }
                return convertToWords(Math.floor(number / 1000)) + " mille" + (number % 1000 !== 0 ? " " + convertToWords(
                    number % 1000) : "");
            }

            if (number < 1000000000) return convertToWords(Math.floor(number / 1000000)) + " million" + (number %
                1000000 !== 0 ? " " + convertToWords(number % 1000000) : "");

            return "montant trop grand";
        }

        // Calcul initial si le champ "nbre_mois" est pré-rempli
        document.addEventListener('DOMContentLoaded', function() {
            calculateAmount();
        });
    </script>

</x-app-layout>
