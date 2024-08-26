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

                <div class="flex justify-end items-center space-x-4">
                    <!-- Bouton pour exporter avec un filtre -->
                    <button type="button" class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md" data-bs-toggle="modal" data-bs-target="#exportModal">
                        Exporter en PDF
                    </button>

                    <!-- Bouton pour ajouter -->
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

    <!-- Fenêtre modale -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Exporter les ménages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous ajouter des filtres avant d'exporter le PDF ?</p>
                </div>
                <div class="modal-footer">
                    <!-- Lien vers export sans filtre -->
                    <a href="{{ route('menages.export') }}" class="btn btn-secondary">Exporter sans
                        filtre</a>

                    <!-- Bouton pour ouvrir le formulaire avec filtres -->
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="document.getElementById('filterForm').style.display='block';">Ajouter
                        des filtres</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de filtre (caché au départ) -->
    <div id="filterForm" style="display:none;">
        <form action="{{ route('menages.export') }}" method="GET">
            <div>
                <label for="secteur">Secteur :</label>
                <select name="secteur_id" id="secteur">
                    <option disabled value="">Tous les secteurs</option>
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->nomSecteur }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="service">Service :</label>
                <select name="service_id" id="service">
                    <option value="">Tous les services</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->type_service }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Exporter avec filtres</button>
        </form>
    </div>
</x-app-layout>
