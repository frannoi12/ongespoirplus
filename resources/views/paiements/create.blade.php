<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page de Paiement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">{{ __('Détails du Ménage') }}</h3>
                    <p>{{ __('Nom:') }} {{ $menage->user->name }}</p>
                    <p>{{ __('Service:') }} {{ $menage->service->type_service }}</p>
                    <p>{{ __('Secteur:') }} {{ $menage->secteur->nomSecteur }}</p>
                    <p>{{ __('Tarif:') }} {{ $menage->tariff->montant . '  ' . $menage->tariff->designation }}</p>

                    <!-- Intégrer le formulaire de paiement ici -->
                    <form action="{{ route('cinetpay.process', $menage->id) }}" method="POST">
                        @csrf
                        <!-- Ajouter ici les détails spécifiques du paiement -->
                        <x-primary-button>
                            {{ __('Payer') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
