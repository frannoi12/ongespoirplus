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
                @if (session('success'))
                    <p class="text-green-500 text-xs mt-1">{{ session('success') }}</p>
                @endif

                <div class="flex justify-end items-center space-x-4" x-data="{ open: false }">
                    <!-- Bouton pour exporter avec un filtre -->
                    <button @click="open = true"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Exporter en PDF
                    </button>

                    <!-- Fenêtre modale pour l'exportation en PDF -->
                    <div x-show="open" @keydown.escape.window="open = false"
                        class="fixed inset-0 flex items-center justify-center z-50">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md">
                            <!-- En-tête de la modale -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Exporter les ménages
                                </h3>
                                <button @click="open = false; window.location.reload()"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Fermer la modale</span>
                                </button>
                            </div>
                            <!-- Corps de la modale -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p id="paragraph" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Voulez-vous ajouter des filtres avant d'exporter le PDF ?
                                </p>
                                <!-- Formulaire de filtre (caché au départ) -->
                                <div id="filterForm" style="display:none; margin-top: 20px;">
                                    <form action="{{ route('menages.export') }}" method="GET">
                                        <div>
                                            <label for="secteur">Secteur :</label>
                                            <select name="secteur_id" id="secteur">
                                                <option value="" disabled selected>Tous les secteurs</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur->id }}">{{ $secteur->nomSecteur }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="service">Service :</label>
                                            <select name="service_id" id="service">
                                                <option value="" disabled selected>Tous les services</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->type_service }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit"
                                            class="mt-4 bg-blue-600 hover:bg-blue-500 text-white px-3 py-2 rounded-md">Exporter
                                            avec filtres</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Pied de la modale -->
                            <div id="noFiliter"
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <a href="{{ route('menages.export') }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Exporter sans filtre
                                </a>
                                <button type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    onclick="showFilterForm()">Ajouter des filtres</button>
                            </div>
                        </div>
                    </div>



                    <!-- Bouton pour ajouter un ménage -->
                    <a href="{{ route('menages.create') }}">
                        <button style="background: green"
                            class="bg-green-600 hover:bg-green-500 text-white text-sm px-3 py-2 rounded-md">
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
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Nom</th>
                            <th class="py-3 px-6">Contact</th>
                            <th class="py-3 px-6">Code</th>
                            <th class="py-3 px-6">Secteur</th>
                            <th class="py-3 px-6">Service</th>
                            <th class="py-3 px-6">Date d'abonnement</th>
                            <th class="py-3 px-6">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($menages as $menage)
                                <tr class="bg-gray-100">
                                    <td class="py-3 px-6">{{ $menage->user->name }}</td>
                                    <td class="py-3 px-6">{{ $menage->user->contact }}</td>
                                    <td class="py-3 px-6">{{ $menage->code }}</td>
                                    <td class="py-3 px-6">{{ $menage->secteur->nomSecteur }}</td>
                                    <td class="py-3 px-6">{{ $menage->service->type_service }}</td>
                                    <td class="py-3 px-6">{{ $menage->date_abonnement }}</td>
                                    <td class="py-3 px-6">
                                        <a href="{{ route('menages.edit', $menage->id) }}">
                                            <button
                                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                        </a>
                                        <a href="{{ route('menages.show', $menage->id) }}">
                                            <button
                                                class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                        </a>
                                        <form action="{{ route('menages.destroy', $menage->id) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce ménage ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Aucun ménages disponible</td>
                                </tr>
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

    <script>
        function showFilterForm() {
            document.getElementById('filterForm').style.display = 'block';
            document.getElementById('paragraph').style.display = 'none';
            document.getElementById('noFiliter').style.display = 'none';
        }
    </script>
</x-app-layout>
