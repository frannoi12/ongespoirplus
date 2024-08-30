<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($menage) ? __('Modifier ménage') : __('Inscription d\'un ménage') }}
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
                                <input type="text" id="contact" name="contact"
                                    value="{{ old('contact', $menage->user->contact ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    oninput="validateContact()">
                                <p id="contactError" class="text-red-500 text-xs mt-1"></p>
                                @error('contact')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 relative">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 pr-10">
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-500 dark:text-gray-300">
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zM12 13a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                </button>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4 relative">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="password_confirmation">Confirmer mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 pr-10">
                                <button type="button" id="togglePasswordConfirmation" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-500 dark:text-gray-300">
                                    <svg id="eyeIconConfirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zM12 13a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                </button>
                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </fieldset>

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information d'un ménage
                            </legend>

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
                                <x-input-label for="tariff_id" :value="__('Tariff')" />
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

                            @php
                                // Décoder la localisation si elle est disponible
                                $localisation = isset($menage->localisation)
                                    ? json_decode($menage->localisation, true)
                                    : null;
                                $latitude = old('latitude', $localisation['latitude'] ?? 8.990347);
                                $longitude = old('longitude', $localisation['longitude'] ?? 1.130433);
                            @endphp

                            <div class="mt-4" id="map">
                                <x-maps-leaflet :centerPoint="[
                                    'lat' => $latitude,
                                    'lng' => $longitude,
                                ]" :zoom="14" style="width: 100%; height: 400px;">
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



                            <!-- Politique de confidentialité -->
                            <div class="mt-4">
                                <x-input-label for="politique" :value="__('Politique de Confidentialité')" />
                                <div
                                    class="max-h-96 overflow-y-auto p-4 border rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <!-- Contenu des politiques de confidentialité -->
                                    @foreach ($politiques as $politique)
                                        <div class="mb-4">
                                            <p class="font-medium">{{ $politique->titre }}</p>
                                            <p>{{ $politique->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="politique_acceptance" :value="__('Acceptez-vous les politiques de confidentialité ?')" />
                                <div class="flex items-center">
                                    <input type="checkbox" id="politique_acceptance" name="politique_acceptance"
                                        value="1"
                                        {{ old('politique_acceptance', isset($menage) && $menage->politique ? 'checked' : '') }}
                                        class="mr-2">
                                    <label for="politique_acceptance"
                                        class="text-gray-700 dark:text-gray-300">{{ __('Oui, j\'ai lu et j\'accepte les politiques de confidentialité') }}</label>
                                </div>
                                @error('politique_acceptance')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>

                        <x-primary-button id="submit-button" :disabled="!old('politique')" class="mt-4">
                            {{ isset($menage) ? __('Mettre à jour') : __('Ajouter') }}
                        </x-primary-button>
                    </form>

                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
    
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.setAttribute('d', 'M13.875 18.825a8.967 8.967 0 01-1.875.175c-4.478 0-8.268-2.944-9.542-7 1.274-4.057 5.064-7 9.542-7 1.18 0 2.313.198 3.374.57');
            } else {
                passwordField.type = 'password';
                eyeIcon.setAttribute('d', 'M15 12A3 3 0 1112 9a3 3 0 013 3zM2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z');
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
    
            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute using getAttribute and setAttribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle the eye icon
                eyeIcon.classList.toggle('text-gray-500'); // Change color when toggled
                eyeIcon.classList.toggle('text-gray-700');
            });
    
            const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const eyeIconConfirmation = document.getElementById('eyeIconConfirmation');
    
            togglePasswordConfirmation.addEventListener('click', function() {
                // Toggle the type attribute using getAttribute and setAttribute
                const type = passwordConfirmationInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmationInput.setAttribute('type', type);
                
                // Toggle the eye icon
                eyeIconConfirmation.classList.toggle('text-gray-500'); // Change color when toggled
                eyeIconConfirmation.classList.toggle('text-gray-700');
            });
        });
    </script>
    
    

    <script>
        document.getElementById('menage-form').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var passwordConfirmation = document.getElementById('password_confirmation').value;
            if (password !== passwordConfirmation) {
                event.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
            }
        });


        function validateContact() {
            const contactInput = document.getElementById('contact').value;
            const errorElement = document.getElementById('contactError');
            const regex = /^(9[0-36-9]|7[0-36-9])\d{6}$/;

            if (regex.test(contactInput)) {
                errorElement.textContent = ''; // Efface le message d'erreur si le contact est valide
            } else {
                errorElement.textContent =
                'Le numéro de téléphone n\'est pas valide.'; // Affiche un message d'erreur si le contact n'est pas valide
            }
        }


        // Initialisation des coordonnées par défaut avec les valeurs récupérées ou anciennes
        var defaultLat = {{ $latitude }};
        var defaultLng = {{ $longitude }};

        // Initialisation de la carte
        var map = L.map('map').setView([defaultLat, defaultLng], 19);

        // Définition de l'icône personnalisée pour le marqueur
        var blueIcon = L.icon({
            iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Ajout d'un marker initial avec l'icône personnalisée
        var marker = L.marker([defaultLat, defaultLng], {
            icon: blueIcon,
            draggable: true
        }).addTo(map);
        marker.bindPopup("Latitude: " + defaultLat + "<br>Longitude: " + defaultLng).openPopup();

        // Ajout des tuiles OpenStreetMap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fonction appelée lors du clic sur la carte
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Mise à jour de la position du marqueur
            marker.setLatLng([lat, lng]).bindPopup("Latitude: " + lat + "<br>Longitude: " + lng).openPopup();

            // Mise à jour des champs cachés avec les nouvelles coordonnées
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });

        // Permettre à l'utilisateur de déplacer le marqueur
        marker.on('dragend', function(e) {
            var latLng = marker.getLatLng();
            document.getElementById('latitude').value = latLng.lat;
            document.getElementById('longitude').value = latLng.lng;

            marker.bindPopup("Latitude: " + latLng.lat + "<br>Longitude: " + latLng.lng).openPopup();
        });


        document.addEventListener('DOMContentLoaded', function() {
            const politiqueAcceptance = document.getElementById('politique_acceptance');
            const submitBtn = document.getElementById('submit-button');
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

                if (allFilled && politiqueAcceptance.checked) {
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


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($menage) ? __('Modifier menage') : __('Inscription d\' une menage') }}
        </h2>
    </x-slot>




    // Initialisation des coordonnées par défaut
        // var defaultLat = {{ old('latitude', 8.990347) }};
        // var defaultLng = {{ old('longitude', 1.130433) }};

        // // Initialisation de la carte
        // var map = L.map('map').setView([defaultLat, defaultLng], 10);

        // // Définition de l'icône personnalisée pour le marqueur
        // var blueIcon = L.icon({
        //     iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
        //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        //     iconSize: [25, 41],
        //     iconAnchor: [12, 41],
        //     popupAnchor: [1, -34],
        //     shadowSize: [41, 41]
        // });

        // // Ajout d'un marker initial avec l'icône personnalisée
        // var marker = L.marker([defaultLat, defaultLng], {
        //     icon: blueIcon
        // }).addTo(map);
        // marker.bindPopup("Latitude: " + defaultLat + "<br>Longitude: " + defaultLng).openPopup();

        // // Ajout des tuiles OpenStreetMap
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);

        // // Ajout d'un popup initial à la position par défaut
        // var popup = L.popup()
        //     .setLatLng([defaultLat, defaultLng])
        //     .setContent("Latitude: " + defaultLat + "<br>Longitude: " + defaultLng)
        //     .openOn(map);

        // // Fonction appelée lors du clic sur la carte
        // function onMapClick(e) {
        //     var lat = e.latlng.lat;
        //     var lng = e.latlng.lng;

        //     // Mise à jour de la position du marqueur
        //     marker.setLatLng([lat, lng]).bindPopup("Latitude: " + lat + "<br>Longitude: " + lng).openPopup();

        //     // Mise à jour des champs cachés avec les nouvelles coordonnées
        //     document.getElementById('latitude').value = lat;
        //     document.getElementById('longitude').value = lng;
        // }

        // // Attacher la fonction de clic à la carte
        // map.on('click', onMapClick);

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
                                    'lat' => old('latitude', 8.978000145592532),
                                    'lng' => old('longitude', 1.1454960246640997),
                                ]" :zoom="19" style="width: 100%; height: 400px;">
                                </x-maps-leaflet>
                                <input type="hidden" id="longitude" name="longitude"
                                    value="{{ old('longitude', 1.1454960246640997) }}">
                                <input type="hidden" id="latitude" name="latitude"
                                    value="{{ old('latitude', 8.978000145592532) }}">
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
                                    <div class="flex items-center space-x-4">
                                        <x-input-label for="politique_acceptance" :value="__('Acceptez-vous les politiques de confidentialité ?')" class="text-lg" />
                                        <div class="flex items-center">
                                            <input type="radio" id="politique_acceptance_yes"
                                                name="politique_acceptance" value="1"
                                                {{ old('politique_acceptance', isset($menage) && $menage->politique ? 'checked' : '') }}
                                                class="mr-2">
                                            <label for="politique_acceptance_yes"
                                                class="text-gray-700 dark:text-gray-300">{{ __('Oui') }}</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="politique_acceptance_no"
                                                name="politique_acceptance" value="0"
                                                {{ old('politique_acceptance', isset($menage) && !$menage->politique ? 'checked' : '') }}
                                                class="mr-2">
                                            <label for="politique_acceptance_no"
                                                class="text-gray-700 dark:text-gray-300">{{ __('Non') }}</label>
                                        </div>
                                    </div>
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
            var map = L.map('map').setView([8.978000145592532, 1.1454960246640997], 19);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker = L.marker([8.978000145592532, 1.1454960246640997], {
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
</x-app-layout> --}}


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
