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
                    @if(session('succes'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('succes') }}</strong>
                        </div>
                    @endif
                    <div class="bg-gray border border-gray-300 dark:border-gray-600 rounded-md p-4">
                        <!-- Nombre de Mois -->
                        <p class="mb-4">
                            <strong>{{ __('Nombre de Mois') }}:</strong> {{ $mobile->nbre_mois }}
                        </p>

                        <!-- Montant -->
                        <p class="mb-4">
                            <strong>{{ __('Montant') }}:</strong> {{ $mobile->montant }} francs CFA
                        </p>

                        <!-- Montant en Lettres -->
                        <p class="mb-4">
                            <strong>{{ __('Montant en Lettres') }}:</strong> {{ $mobile->montant_lettre }}
                        </p>

                        <!-- Objet -->
                        <p class="mb-4">
                            <strong>{{ __('Objet') }}:</strong> {{ $mobile->objet }}
                        </p>

                        <!-- Secteur -->
                        <p class="mb-4">
                            <strong>{{ __('Secteur') }}:</strong> {{ $mobile->paiement->menage->secteur->nomSecteur }}
                        </p>

                        <!-- Tariff -->
                        <p class="mb-4">
                            <strong>{{ __('Tariff') }}:</strong> {{ $mobile->paiement->menage->tariff->montant }} francs CFA
                        </p>
                    </div>
                    {{-- {{ $paiement = $mobile->paiement}}
                    {{ $menage = $paiement->menage}} --}}

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('cinetpay.payment', compact('mobile','paiement','menage')) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('Effectuer mon paiement en ligne') }}
                        </a>

                        <!-- Bouton Modifier -->
                        <a href="{{ route('mobiles.edit', ['id' => $mobile->id]) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                            {{ __('Modifier le paiement') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
