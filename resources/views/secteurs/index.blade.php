<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Secteurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Liste des secteurs') }}
                </div>
                <div>
                    @can('secteur_create')
                        <a href="{{ route('secteurs.create') }}">
                            <button style="background: green"
                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                                Ajouter
                            </button>
                        </a>
                    @endcan
                </div>
            </div>
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <div class="w-full flex items-center">
                            <form action="{{ route('secteurs.index') }}" method="get" class="w-full flex">
                                <input type="text" name="search" placeholder="Rechercher"
                                    class="flex-grow rounded-md border border-gray-300 px-3 py-2 mr-2">
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-500 text-white text-sm px-3 py-2 rounded-md">
                                    Rechercher
                                </button>
                            </form>
                        </div>
                        {{-- <form action="{{ route('secteurs.index') }}" method="get">
                            <input type="text" name="search" placeholder="Rechercher"
                                class="w-2/3 rounded-md border border-gray-300">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md"
                                style="background:green ">
                                Rechercher
                            </button>
                        </form> --}}
                    </div>
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Nom du secteur</th>
                            <th class="py-3 px-6">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($secteurs as $secteur)
                                <tr class="bg-gray-100">
                                    <td class="py-3 px-6">
                                        {{ $secteur->nomSecteur }}
                                    </td>
                                    <td class="py-3 px-6">
                                        @can('secteur_update')
                                            <a href="{{ route('secteurs.edit', $secteur->id) }}">
                                                <button
                                                    class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                            </a>
                                        @endcan
                                        <a href="{{ route('secteurs.show', $secteur->id) }}">
                                            <button
                                                class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                        </a>
                                        @can('secteur_delete')
                                            <form action="{{ route('secteurs.destroy', $secteur->id) }}" method="POST"
                                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce secteur ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                Aucun secteur disponible
                            @endforelse
                        </tbody>
                    </table>
                    <div>{{ $secteurs->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
