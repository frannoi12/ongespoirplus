<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Liste des Menages') }}
                </div>
                <div class="flex justify-end mb-4">
                    <!-- Bouton pour exporter avec un filtre -->
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                        data-modal-target="#exportModal">
                        Exporter avec filtre
                    </button>

                    <!-- Bouton pour exporter sans filtre -->
                    <form action="{{ route('menages.export.pdf') }}" method="get">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Exporter PDF
                        </button>
                    </form>
                </div>

                <!-- Modal pour le choix du filtre (comme avant) -->
                {{-- <div id="exportModal"
                    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <form action="{{ route('menages.export') }}" method="get">
                            <label for="filterType">Exporter par :</label>
                            <select id="filterType" name="filterType" class="form-select mt-1 block w-full">
                                <option value="sector">Secteur</option>
                                <option value="tariff">Tariff</option>
                            </select>
                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Exporter
                                </button>
                            </div>
                        </form>
                    </div>
                </div> --}}

                <div>
                    <a href="{{ route('menages.create') }}">
                        <button style="background: green"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                            Ajouter
                        </button>
                    </a>
                </div>
            </div>
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <form action="{{ route('menages.index') }}" method="get">
                            <input type="text" name="search" placeholder="Rechercher"
                                class="w-2/3 rounded-md border border-gray-300">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md"
                                style="background:green ">
                                Rechercher
                            </button>
                        </form>
                    </div>
                    <table class="w-full text-left ">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Nom</th>
                            <th class="py-3 px-6">Contact</th>
                            <th class="py-3 px-6">code</th>
                            <th class="py-3 px-6">Secteur</th>
                            <th class="py-3 px-6">Service</th>
                            <th class="py-3 px-6">Date d'abonnement</th>
                            <th class="py-3 px-6">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($menages as $menage)
                                <tr class="bg-gray-100">
                                    <td class="py-3 px-6">
                                        {{ $menage->user->name }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $menage->user->contact }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $menage->code }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $menage->secteur->nomSecteur }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $menage->service->type_service }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $menage->date_abonnement }}
                                    </td>
                                    <td class="py-3 px-6">
                                        <a href="{{ route('menages.edit', $menage->id) }}">
                                            <button
                                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                        </a>
                                        <a href="{{ route('menages.show', $menage->id) }}">
                                            @csrf
                                            <button
                                                class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                        </a>
                                        <form action="{{ route('menages.destroy', $menage->id) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette menage ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                Aucun menages disponible
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $menages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
