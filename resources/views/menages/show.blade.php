<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails d\'un ménage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information Générale
                        </legend>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                            <p>{{ $menage->user->name }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                            <p>{{ $menage->user->prenom }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <p>{{ $menage->user->email }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact</label>
                            <p>{{ $menage->user->contact }}</p>
                        </div>
                    </fieldset>

                    <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information sur le Ménage
                        </legend>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Politique</label>
                            <p>{{ $menage->politique ? 'Acceptée' : 'Non acceptée' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secteur</label>
                            <p>{{ $menage->secteur->nomSecteur }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service</label>
                            <p>{{ $menage->service->type_service }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tarif</label>
                            <p>{{ $menage->tariff->montant }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Code</label>
                            <p>{{ $menage->code }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date
                                d'Abonnement</label>
                            <p>{{ $menage->date_abonnement }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Prise
                                d'Effet</label>
                            <p>{{ $menage->date_prise_effet }}</p>
                        </div>

                        @php
                            // Décoder la localisation si elle est disponible
                            $localisation = isset($menage->localisation)
                                ? json_decode($menage->localisation, true)
                                : null;
                            $latitude = old('latitude', $localisation['latitude'] ?? 8.990347);
                            $longitude = old('longitude', $localisation['longitude'] ?? 1.130433);
                        @endphp


                        <div class="mt-4" id="map" style="height: 400px; width: 100%;">
                            <!-- Carte initialisée avec les coordonnées -->
                            <x-maps-leaflet :centerPoint="[
                                'lat' => $latitude,
                                'lng' => $longitude,
                            ]" :zoom="14">
                            </x-maps-leaflet>

                            <input type="hidden" id="longitude" name="longitude" value="{{ $longitude }}">
                            <input type="hidden" id="latitude" name="latitude" value="{{ $latitude }}">

                            @error('longitude')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            @error('latitude')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>

                    <div class="flex justify-end">
                        <a href="{{ route('menages.edit', $menage->id) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Coordonnées du ménage
        var latitude = {{ $latitude }};
        var longitude = {{ $longitude }};

        // Initialisation de la carte
        var map = L.map('map').setView([latitude, longitude], 14);

        // Ajout des tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajout d'un marqueur
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Latitude: ' + latitude + '<br>Longitude: ' + longitude)
            .openPopup();

        // Désactivation des interactions avec la carte
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.boxZoom.disable();
        map.keyboard.disable();
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var latitude = @json(json_decode($menage->localisation)->latitude);
        var longitude = @json(json_decode($menage->localisation)->longitude);

        var map = L.map('map').setView([latitude, longitude], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([latitude, longitude]).addTo(map);
    });
</script> --}}
