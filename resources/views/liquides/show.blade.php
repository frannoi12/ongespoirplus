<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du Paiement en Liquide') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('succes'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ session('succes') }}</strong>
                        </div>
                    @endif

                    <div class="bg-white border border-gray-300 rounded-md p-4">
                        <p><strong>Nbre Mois:</strong> {{ $liquid->nbre_mois }}</p>
                        <p><strong>Montant:</strong> {{ $liquid->montant }} FCFA</p>
                        <p><strong>Montant en Lettres:</strong> {{ $liquid->montant_lettre }}</p>
                        <p><strong>Objet:</strong> {{ $liquid->objet }}</p>
                        <p><strong>Tariff :</strong> {{ $liquid->paiement->tariff->montant }}</p>
                        <p><strong>Secteur :</strong> {{ $liquid->paiement->menage->secteur->nomSecteur }}</p>
                    </div>

                    <div class="mt-4 flex space-x-4">
                        <!-- Télécharger le PDF -->
                        <a href="{{ route('pdf.generate', ['id' => $liquid->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                            Télécharger le PDF
                        </a>

                        <!-- Modifier le Reçu -->
                        <a href="{{ route('liquides.edit', ['id' => $liquid->id]) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">
                            Modifier le Reçu
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
