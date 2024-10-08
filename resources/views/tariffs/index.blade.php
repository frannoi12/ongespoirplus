<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('tariffs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @if (session('success'))
                    <div class="alert alert-success bg-green-500 text-white p-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
                <div
                    class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Liste des tariffs') }}
                    </div>
                    <div>
                        @can('tariff_create')
                            <a href="{{ route('tariffs.create') }}">
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
                        <div class="w-full flex items-center">
                            <form action="{{ route('tariffs.index') }}" method="get" class="w-full flex">
                                <input type="text" name="search" placeholder="Rechercher"
                                    class="flex-grow rounded-md border border-gray-300 px-3 py-2 mr-2">
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-500 text-white text-sm px-3 py-2 rounded-md">
                                    Rechercher
                                </button>
                            </form>
                        </div>

                        <table class="w-full text-left">
                            <thead class="text-lg font-semibold bg-gray-300">
                                <th class="py-3 px-6">Description</th>
                                <th class="py-3 px-6">Montant</th>
                                <th class="py-3 px-6">Action</th>
                            </thead>
                            <tbody>

                                @forelse ($tariffs as $tariff)
                                    <tr class="bg-gray-100">
                                        <td class="py-3 px-6">
                                            {{ $tariff->designation }}
                                        </td>
                                        <td class="py-3 px-6">
                                            {{ $tariff->montant }}
                                        </td>
                                        <td class="py-3 px-6">
                                            @can('tariff_update')
                                                <a href="{{ route('tariffs.edit', $tariff->id) }}">
                                                    <button
                                                        class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                                </a>
                                            @endcan
                                            <a href="{{ route('tariffs.show', $tariff->id) }}">
                                                @csrf
                                                <button
                                                    class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Voir
                                                    Plus</button>
                                            </a>
                                            @can('tariff_delete')
                                                <form action="{{ route('tariffs.destroy', $tariff->id) }}" method="POST"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette politique ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    Aucun tariff disponible
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $tariffs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
