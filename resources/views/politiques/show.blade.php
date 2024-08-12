<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails de la Politique') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Description :</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $politique->description }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-200">Personnel :</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $politique->personnel->user->name ?? 'N/A' }}</p>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('politiques.index') }}">
                        <button class="bg-gray-600 hover:bg-gray-500 text-white text-sm px-4 py-2 rounded-md">
                            Retour à la liste
                        </button>
                    </a>
                    <a href="{{ route('politiques.edit', $politique->id) }}">
                        <button
                            class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-4 py-2 rounded-md">Editer</button>
                    </a>
                    <form action="{{ route('politiques.destroy', $politique->id) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette politique ?');"
                        class="ml-3">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-red-600 hover:bg-red-500 text-white text-sm px-4 py-2 rounded-md">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
