<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($menage) ? __('Modifier menage') : __('Inscription d\' une menage') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($menage) ? route('menages.update', $menage->id) : route('menages.store') }}"
                        method="POST" id="menage-form">
                        @csrf
                        @if (isset($menage))
                            @method('PUT')
                        @endif

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information Générale
                            </legend>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="name">Nom</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $menage->user->name ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="prenom">Prenom</label>
                                <input type="text" id="prenom" name="prenom"
                                    value="{{ old('prenom', $menage->user->prenom ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('prenom')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="email">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $menage->user->email ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="contact">Contact</label>
                                <input type="contact" id="contact" name="contact"
                                    value="{{ old('contact', $menage->user->contact ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('contact')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="password">Mot de passe</label>
                                <input type="password" id="password" name="password"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="password_confirmation">Confirmer mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information d'une
                                ménage</legend>

                            <div class="mt-4">
                                <x-input-label for="service_id" :value="__('Service')" />
                                <select id="service_id" name="service_id"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option disabled
                                        {{ !isset($menage) || !isset($menage->service_id) ? 'selected' : '' }}>
                                        Sélectionnez un service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ isset($menage) && $menage->service_id == $service->id ? 'selected' : '' }}>
                                            {{ $service->type_service }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-input-label for="secteur_id" :value="__('Secteur')" />
                                <select id="secteur_id" name="secteur_id"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option disabled
                                        {{ !isset($menage) || !isset($menage->secteur_id) ? 'selected' : '' }}>
                                        Sélectionnez votre secteur</option>
                                    @foreach ($secteurs as $secteur)
                                        <option value="{{ $secteur->id }}"
                                            {{ isset($menage) && $menage->secteur_id == $secteur->id ? 'selected' : '' }}>
                                            {{ $secteur->nomSecteur }}</option>
                                    @endforeach
                                </select>
                                @error('secteur_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-input-label for="tariff_id" :value="__('Tarif')" />
                                <select id="tariff_id" name="tariff_id"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option disabled
                                        {{ !isset($menage) || !isset($menage->tariff_id) ? 'selected' : '' }}>
                                        Sélectionnez votre tarif</option>
                                    @foreach ($tariffs as $tariff)
                                        <option value="{{ $tariff->id }}"
                                            {{ isset($menage) && $menage->tariff_id == $tariff->id ? 'selected' : '' }}>
                                            {{ $tariff->montant . '  ' . $tariff->designation }}</option>
                                    @endforeach
                                </select>
                                @error('tariff_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mt-4">
                                <x-maps-leaflet :center="[
                                    'lat' => old('latitude', $menage->latitude ?? 8.98732401440619),
                                    'lng' => old('longitude', $menage->longitude ?? 1.103867358597653),
                                ]" :zoom="19" style="width: 100%; height: 400px;">
                                </x-maps-leaflet>
                                <input type="hidden" id="longitude" name="longitude"
                                    value="{{ old('longitude', $menage->longitude ?? 1.103867358597653) }}">
                                <input type="hidden" id="latitude" name="latitude"
                                    value="{{ old('latitude', $menage->latitude ?? 8.98732401440619) }}">
                                @error('longitude')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                @error('latitude')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>




                            <!-- Politique de confidentialité -->
                            <div class="mt-4">
                                <x-input-label for="politique" :value="__('Politique de Confidentialité')" />
                                <div
                                    class="max-h-96 overflow-y-auto p-4 border rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <!-- Contenu des politiques de confidentialité -->
                                    @foreach ($politiques as $politique)
                                        <li>
                                            <ul>{{ $politique->description }}</ul>
                                        </li>
                                    @endforeach
                                </div>

                                <div class="mt-2">
                                    <x-input-label for="politique_acceptance" :value="__('Acceptez-vous les politiques de confidentialité?')" />
                                    <select id="politique_acceptance" name="politique_acceptance" required
                                        class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                        <option value="" disabled
                                            {{ !isset($menage) || !isset($menage->politique) ? 'selected' : '' }}>
                                            Sélectionnez une option</option>
                                        <option value="1"
                                            {{ isset($menage) && $menage->politique ? 'selected' : '' }}>Oui</option>
                                        <option value="0"
                                            {{ isset($menage) && !$menage->politique ? 'selected' : '' }}>Non</option>
                                    </select>
                                    @error('politique_acceptance')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                        </fieldset>

                        <!-- Bouton au centre -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" id="submit-button"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                {{ isset($menage) ? __('Mettre à jour') : __('Ajouter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menage-form').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var passwordConfirmation = document.getElementById('password_confirmation').value;
            if (password !== passwordConfirmation) {
                event.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([{{ old('latitude', $menage->latitude ?? 8.98732401440619) }},
                {{ old('longitude', $menage->longitude ?? 1.103867358597653) }}
            ], 19);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker = L.marker([{{ old('latitude', $menage->latitude ?? 8.98732401440619) }},
                {{ old('longitude', $menage->longitude ?? 1.103867358597653) }}
            ], {
                draggable: true
            }).addTo(map);

            marker.on('dragend', function(e) {
                var latlng = marker.getLatLng();
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;
            });

            map.on('click', function(e) {
                var latlng = e.latlng;
                marker.setLatLng(latlng);
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const politiqueAcceptance = document.getElementById('politique_acceptance');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('menage-form');
            const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');

            // Désactiver le bouton de soumission par défaut
            submitBtn.disabled = true;

            function checkFormValidity() {
                let allFilled = true;

                requiredFields.forEach(field => {
                    if (!field.value) {
                        allFilled = false;
                    }
                });

                if (allFilled && politiqueAcceptance.value === '1') {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            }

            requiredFields.forEach(field => {
                field.addEventListener('input', checkFormValidity);
            });

            politiqueAcceptance.addEventListener('change', checkFormValidity);
        });
    </script>
</x-app-layout>


{{-- <div class="form-group">
                                <label for="localisation">Localisation</label>
                                <input type="text" id="localisation" name="localisation"
                                    value="{{ old('localisation', $menage->localisation ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                @error('localisation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <button type="button" id="getLocation" class="btn btn-primary">Prendre ma position
                                    actuelle</button>
                            </div> --}}





{{-- // document.getElementById('localisation').addEventListener('click', function() {
// if (confirm('Voulez-vous qu\'on prenne votre position actuelle ?')) {
// if (navigator.geolocation) {
// navigator.geolocation.getCurrentPosition(function(position) {
// const latitude = position.coords.latitude;
// const longitude = position.coords.longitude;
// document.getElementById('localisation').value = latitude + ', ' + longitude;
// }, function(error) {
// alert('Erreur lors de la récupération de votre position: ' + error.message);
// });
// } else {
// alert('La géolocalisation n\'est pas supportée par ce navigateur.');
// }
// } else {
// document.getElementById('localisation').removeAttribute('readonly');
// }
// });

// document.addEventListener('DOMContentLoaded', function() {
// const politiqueAcceptance = document.getElementById('politique_acceptance');
// const submitBtn = document.getElementById('submitBtn');

// // Désactiver le bouton de soumission par défaut
// submitBtn.disabled = true;

// politiqueAcceptance.addEventListener('change', function() {
// if (this.value === '1') {
// submitBtn.disabled = false;
// } else {
// submitBtn.disabled = true;
// }
// });
// });



// document.getElementById('getLocation').addEventListener('click', function() {
// if (navigator.geolocation) {
// navigator.geolocation.getCurrentPosition(function(position) {
// const latitude = position.coords.latitude;
// const longitude = position.coords.longitude;
// document.getElementById('localisation').value = latitude + ', ' + longitude;
// }, function(error) {
// alert('Erreur lors de la récupération de votre position: ' + error.message);
// });
// } else {
// alert('La géolocalisation n\'est pas supportée par ce navigateur.');
// }
// });
 --}}






{{-- <x-app-layout>
                        <div class="mt-4">
                            <x-input-label for="politique" :value="__('Politique')" />
                            <select id="politique" name="politique" class="block mt-1 w-full">
                                <option value="1" {{ isset($menage) && $menage->politique ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ isset($menage) && !$menage->politique ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="personne_a_contacter" :value="__('Personne à Contacter')" />
                            <x-text-input id="personne_a_contacter" class="block mt-1 w-full" type="text" name="personne_a_contacter" value="{{ isset($menage) ? $menage->personne_a_contacter : '' }}" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="localisation" :value="__('Localisation')" />
                            <x-text-input id="localisation" class="block mt-1 w-full" type="text" name="localisation" value="{{ isset($menage) ? $menage->localisation : '' }}" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="secteur_id" :value="__('Secteur')" />
                            <select id="secteur_id" name="secteur_id" class="block mt-1 w-full">
                                @foreach ($secteurs as $secteur)
                                    <option value="{{ $secteur->id }}" {{ isset($menage) && $menage->secteur_id == $secteur->id ? 'selected' : '' }}>{{ $secteur->nomSecteur }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="service_id" :value="__('Service')" />
                            <select id="service_id" name="service_id" class="block mt-1 w-full">
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ isset($menage) && $menage->service_id == $service->id ? 'selected' : '' }}>{{ $service->type_service }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="user_id" :value="__('Utilisateur')" />
                            <select id="user_id" name="user_id" class="block mt-1 w-full">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($menage) && $menage->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tariff_id" :value="__('Tarif')" />
                            <select id="tariff_id" name="tariff_id" class="block mt-1 w-full">
                                @foreach ($tariffs as $tariff)
                                    <option value="{{ $tariff->id }}" {{ isset($menage) && $menage->tariff_id == $tariff->id ? 'selected' : '' }}>{{ $tariff->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ isset($menage) ? __('Mettre à jour') : __('Créer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
