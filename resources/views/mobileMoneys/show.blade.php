<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails du Paiement Mobile Money') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Détails du Paiement</legend>

                        <!-- Nombre de Mois -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nombre de Mois') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->nbre_mois }}
                            </p>
                        </div>

                        <!-- Montant -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Montant') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->montant }} francs CFA
                            </p>
                        </div>

                        <!-- Montant en Lettres -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Montant en Lettres') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->montant_lettre }}
                            </p>
                        </div>

                        <!-- Objet -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Objet') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->objet }}
                            </p>
                        </div>

                        <!-- Secteur -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Secteur') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->paiement->menage->secteur->nomSecteur }}
                            </p>
                        </div>

                        <!-- Tariff -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Tariff') }}</label>
                            <p class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $mobileMoney->paiement->menage->tariff->montant }} francs CFA
                            </p>
                        </div>
                    </fieldset>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('mobileMoneys.index') }}" class="text-blue-500 hover:underline">{{ __('Retour à la liste') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
