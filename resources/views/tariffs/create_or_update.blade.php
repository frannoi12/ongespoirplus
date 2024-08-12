<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($tariff) ? __('Modifier un Tarif') : __('Créer un Tarif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST"
                      action="{{ isset($tariff) ? route('tariffs.update', $tariff->id) : route('tariffs.store') }}">
                    @csrf
                    @if(isset($tariff))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="designation" class="block text-gray-700 dark:text-gray-200">Désignation</label>
                        <textarea id="designation" name="designation"
                                  class="w-full rounded-md border border-gray-300">{{ old('designation', $tariff->designation ?? '') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="montant" class="block text-gray-700 dark:text-gray-200">Montant</label>
                        <input type="text" id="montant" name="montant"
                                  class="w-full rounded-md border border-gray-300" value="{{ old('montant', $tariff->montant ?? '') }}">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-sm px-4 py-2 rounded-md">
                            {{ isset($tariff) ? __('Mettre à jour') : __('Ajouter') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
