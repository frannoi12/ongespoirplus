<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Paiement en Liquide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('liquides.store') }}">
                        @csrf

                        <!-- Nombre de Mois -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="nbre_mois">{{ __('Nombre de Mois') }}</label>
                            <input id="nbre_mois"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                type="number" name="nbre_mois" required oninput="calculateAmount()" />
                        </div>

                        <!-- Montant -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="montant">{{ __('Montant') }}</label>
                            <input id="montant"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                type="number" name="montant" required />
                        </div>

                        <!-- Montant en Lettres -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="montant_lettre">{{ __('Montant en Lettres') }}</label>
                            <textarea id="montant_lettre"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                name="montant_lettre" required></textarea>
                        </div>

                        <!-- Objet -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="objet">{{ __('Objet') }}</label>
                            <textarea id="objet"
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                name="objet" required></textarea>
                        </div>

                        <!-- Secteur -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="secteur_id">{{ __('Secteur') }}</label>
                            <p
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $paiement->menage->secteur->nomSecteur }}
                            </p>
                        </div>

                        <!-- Tariff -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="tariff_id">{{ __('Tariff') }}</label>
                            <p
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $paiement->menage->tariff->montant }}
                            </p>
                        </div>

                        <!-- Paiement ID caché -->
                        <input type="hidden" name="paiement_id" value="{{ $paiement->id }}">

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Enregistrer le Paiement en Liquide') }}
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
            let tarifMontant = {{ $paiement->menage->tariff->montant }};
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
            if (number < 1000000) return convertToWords(Math.floor(number / 1000)) + " mille" + (number % 1000 !== 0 ? " " +
                convertToWords(number % 1000) : "");
            if (number < 1000000000) return convertToWords(Math.floor(number / 1000000)) + " million" + (number %
                1000000 !== 0 ? " " + convertToWords(number % 1000000) : "");

            return "montant trop grand";
        }
    </script>

</x-app-layout>
