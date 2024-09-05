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
                    <p>{{ __('Nom :') }} {{ $menage->user->name }}</p>
                    <p>{{ __('Service :') }} {{ $menage->service->type_service }}</p>
                    <p>{{ __('Secteur :') }} {{ $menage->secteur->nomSecteur }}</p>
                    <p>{{ __('Tarif :') }} {{ $menage->tariff->montant . '  ' . $menage->tariff->designation }}</p>

<<<<<<< HEAD
<<<<<<< HEAD
                    <!-- Intégrer le formulaire de paiement ici -->
                    <form action="{{ route('cinetpay.process', $menage->id) }}" method="POST">
                        @csrf
                        <!-- Ajouter ici les détails spécifiques du paiement -->
                        <x-primary-button>
                            {{ __('Payer') }}
                        </x-primary-button>
                    </form>

                    
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
=======
=======
>>>>>>> cb8100421260b00db6a6c4460d22a9bb1353d3a9
                    <!-- Conteneur des boutons de paiement -->
                    <div class="mt-6 flex space-x-4">
                        <!-- Bouton pour paiement en liquide -->
                        <form action="{{ route('paiements.store', $menage->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="liquide">
                            <input type="hidden" name="menage_id" value="{{ $menage->id }}">
                            <input type="hidden" name="personnel_id" value="{{ Auth::user()->id }}">
                            <x-primary-button>
                                {{ __('Payer en liquide') }}
                            </x-primary-button>
                        </form>

                        <!-- Bouton pour paiement en ligne -->
                        <form action="{{ route('paiements.store', $menage->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="mobileMoney">
                            <input type="hidden" name="menage_id" value="{{ $menage->id }}">
                            <input type="hidden" name="personnel_id" value="{{ Auth::user()->id }}">
                            <x-primary-button>
                                {{ __('Payer en ligne') }}
                            </x-primary-button>
                        </form>
                    </div>
<<<<<<< HEAD
>>>>>>> cb8100421260b00db6a6c4460d22a9bb1353d3a9
=======
>>>>>>> cb8100421260b00db6a6c4460d22a9bb1353d3a9
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
