<x-guest-layout>
    <!-- Ajout de l'image de fond avec Tailwind CSS -->
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

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

<<<<<<< HEAD
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

            <x-primary-button id="submit-button" class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
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
</x-guest-layout>
