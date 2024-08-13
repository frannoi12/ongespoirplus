<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails du Secteur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ $secteur->nomSecteur }}</h3>

                    <!-- Vous pouvez ajouter ici d'autres détails du secteur si nécessaire -->

                    <div class="flex space-x-4 mt-4">
                        <a href="{{ route('secteurs.edit', $secteur->id) }}">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-4 py-2 rounded-md">
                                Modifier
                            </button>
                        </a>

                        <form action="{{ route('secteurs.destroy', $secteur->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce secteur ?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-4 py-2 rounded-md">
                                Supprimer
                            </button>
                        </form>

                        <a href="{{ route('secteurs.index') }}">
                            <button class="bg-gray-600 hover:bg-gray-500 text-white text-sm px-4 py-2 rounded-md">
                                Retour à la liste
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
