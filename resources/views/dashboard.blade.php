<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Informations') }}
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @auth
                            <table class="table-auto w-full">
                                <thead>

                                    {{-- {{ dd(Auth::user())}} --}}
                                    {{-- <tr>
                                        <th class="px-4 py-2">Attribut</th>
                                        <th class="px-4 py-2">Valeur</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border px-4 py-2">{{ __('Nom') }}</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Prenom</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Email</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Contact</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->contact }}</td>
                                    </tr>
                                    @if (Auth::user()->personnel)
                                        <tr>
                                            <td class="border px-4 py-2">Etat</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->personnel->etat }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Role</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->personnel->role }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if (Auth::user()->menage)
                                        <tr>
                                            <td class="border px-4 py-2">Code de votre maison</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->menage->code }}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="border px-4 py-2">Personne à contacter</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->menage->personne_a_contacter }}
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td class="border px-4 py-2">Date d'abonnement</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->menage->date_abonnement }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Date de prise d'effet</td>
                                            <td class="border px-4 py-2">
                                                @if (!auth()->user()->menage->paiements->isEmpty())
                                                    {{ auth()->user()->menage->date_prise_effet }}
                                                @else
                                                    Payer votre adhésion pour la prise d'effet
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Secteur</td>
                                            <td class="border px-4 py-2">
                                                {{ Auth::user()->menage->secteur->nomSecteur }}
                                            </td>
                                        </tr>
                                        @php
                                            // Décoder la localisation si elle est disponible
                                            $localisation = isset(Auth::user()->menage->localisation)
                                                ? json_decode(Auth::user()->menage->localisation, true)
                                                : null;
                                            $latitude = old('latitude', $localisation['latitude'] ?? 8.990347);
                                            $longitude = old('longitude', $localisation['longitude'] ?? 1.130433);
                                        @endphp

                                        <tr>
                                            {{-- {{dd(Auth::user()->menage->localisation)}} --}}
                                            <td class="border px-4 py-2">Localisation</td>
                                            <td class="border px-4 py-2">
                                                <div class="mt-4" id="map" style="height: 400px; width: 100%;">
                                                    <!-- Carte initialisée avec les coordonnées -->
                                                    <x-maps-leaflet :centerPoint="[
                                                        'lat' => $latitude,
                                                        'lng' => $longitude,
                                                    ]" :zoom="14">
                                                    </x-maps-leaflet>

                                                    <input type="hidden" id="longitude" name="longitude"
                                                        value="{{ $longitude }}">
                                                    <input type="hidden" id="latitude" name="latitude"
                                                        value="{{ $latitude }}">

                                                    @error('longitude')
                                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                    @enderror

                                                    @error('latitude')
                                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        @else
                            <p>Vous n'êtes pas connecté.</p>
                        @endauth
                    </div>
                    <div class="flex flex-col  justify-content items-center">
                        @role('client')
                            @if (auth()->user()->menage->paiements->isEmpty())
                                <a href="{{ route('paiements.createEnLigne', auth()->user()->menage->id) }}">
                                    <button class="bg-green-600 hover:bg-green-500 text-white text-sm px-3 py-2 rounded-md">
                                        payer
                                    </button>
                                </a>
                            @endif
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Coordonnées du ménage
            var latitude = {{ $latitude ?? '' }};
            var longitude = {{ $longitude ?? '' }};

            // Initialisation de la carte
            var map = L.map('map').setView([latitude, longitude], 18);

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
</x-app-layout>
