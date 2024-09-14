<x-guest-layout>
    <!-- Ajout de l'image de fond avec Tailwind CSS -->
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">

        <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-800 bg-opacity-75 p-6 rounded-lg shadow-lg w-full max-w-md" id="menage-form">
            @csrf

>>>>>>> 12a2817 (login et register)
=======


    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
>>>>>>> 476a151 (font image de connexion et d'inscription)
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">
=======
>>>>>>> 320fdfb (font image de connexion et d'inscription)
=======
>>>>>>> c620c38 (login et register)
=======
>>>>>>> 6c1649d (font image de connexion et d'inscription)
=======
>>>>>>> 513744a (login et register)
=======
>>>>>>> 51480e6 (font image de connexion et d'inscription)
=======
>>>>>>> 4d888ba (login et register)
=======
>>>>>>> 0147184 (font image de connexion et d'inscription)


=======

>>>>>>> 0aa5346 (font image de connexion et d'inscription)
    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">

        <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-800 bg-opacity-75 p-6 rounded-lg shadow-lg w-full max-w-md" id="menage-form">
            @csrf

>>>>>>> a1b138e (login et register)
=======


    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
>>>>>>> 2f545d6 (font image de connexion et d'inscription)
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prenom -->
        <div>
            <x-input-label for="Prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">

        <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-800 bg-opacity-75 p-6 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div>
                <x-input-label for="Prenom" :value="__('Prenom')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>
>>>>>>> 4552cd5 (login et register)

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

<<<<<<< HEAD
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2957510 (personnel)
        <!-- Contact -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" oninput="validateContact()" class="block mt-1 w-full" type="tel"
                name="contact" :value="old('contact')" required autocomplete="contact" oninput="validateContact()"/>
            <span id="contactError" class="text-red-500 text-sm mt-2"></span> <!-- Élement pour afficher les erreurs -->
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>


<<<<<<< HEAD
=======
>>>>>>> a1b138e (login et register)
=======
>>>>>>> 2957510 (personnel)
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

<<<<<<< HEAD
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
=======
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
=======
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
>>>>>>> a1b138e (login et register)

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
>>>>>>> 4552cd5 (login et register)

=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">
=======
>>>>>>> 087c0a6 (font image de connexion et d'inscription)

    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

            <!-- Prenom -->
            <div>
                <x-input-label for="Prenom" :value="__('Prenom')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

>>>>>>> 7d7fd24 (login et register)
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
<<<<<<< HEAD

<<<<<<< HEAD
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

<<<<<<< HEAD
        {{-- <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information d'un ménage
            </legend> --}}

        <div class="mt-4">
            <x-input-label for="service_id" :value="__('Organisme')" />
            <select id="service_id" name="service_id"
                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option disabled {{ !isset($menage) || !isset($menage->service_id) ? 'selected' : '' }}>
                    Sélectionnez un organisme</option>
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
                <option disabled {{ !isset($menage) || !isset($menage->secteur_id) ? 'selected' : '' }}>
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
                <option disabled {{ !isset($menage) || !isset($menage->tariff_id) ? 'selected' : '' }}>
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
            $localisation = isset($menage->localisation) ? json_decode($menage->localisation, true) : null;
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
                <input type="checkbox" id="politique_acceptance" name="politique_acceptance" value="1"
                    {{ old('politique_acceptance', isset($menage) && $menage->politique ? 'checked' : '') }}
                    class="mr-2">
                <label for="politique_acceptance"
                    class="text-gray-700 dark:text-gray-300">{{ __('Oui, j\'ai lu et j\'accepte les politiques de confidentialité') }}</label>
            </div>
<<<<<<< HEAD
>>>>>>> 57ec7bd (login et register)
=======
            @error('politique_acceptance')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- </fieldset> --}}
>>>>>>> 7bea7f9 (login et register)

=======
>>>>>>> 513744a (login et register)
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
=======
>>>>>>> 7d7fd24 (login et register)

    </div>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
<<<<<<< HEAD
<<<<<<< HEAD
=======
    </div>
>>>>>>> 4552cd5 (login et register)
=======
>>>>>>> a1b138e (login et register)
=======

    <script>


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
>>>>>>> 2957510 (personnel)
</x-guest-layout>
